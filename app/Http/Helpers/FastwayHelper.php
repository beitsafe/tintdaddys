<?php

namespace App\Http\Helpers;


use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class FastwayHelper
{
    const IDENTITY_ENDPOINT = 'https://identity.fastway.org/connect/token';
    const API_ENDPOINT = 'https://api.myfastway.com.au';

    private $client;

    public $isEnabled = false;
    public $debug;

    public function __construct($debug = false)
    {
        if (!env('MYFASTWAY_ENABLED', false)) {
            return false;
        }

        $this->isEnabled = true;
        $this->debug = $debug;
        $this->client = new \GuzzleHttp\Client(['base_uri' => self::API_ENDPOINT]);
    }

    public function refreshAccessToken()
    {
        if ($tokenCache = Cache::get('myfastway.token')) {
            if (isset($tokenCache['token']) && isset($tokenCache['expired'])) { // Check token & expired exists
                if ($tokenCache['expired'] > Carbon::now('UTC')->subMinutes(5)) { // Check token expire before 5 mins
                    return $tokenCache['token'];
                }
            }
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->post(self::IDENTITY_ENDPOINT, [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env('MYFASTWAY_CLIENT_ID'),
                'client_secret' => env('MYFASTWAY_CLIENT_SECRET'),
                'scope' => env('MYFASTWAY_CLIENT_SCOPE')
            ]
        ]);

        $result = json_decode($response->getBody());

        $tokenArray = [
            'token' => $result->token_type . ' ' . $result->access_token,
            'expired' => Carbon::now('UTC')->addSeconds($result->expires_in),
        ];

        Cache::forever('myfastway.token', $tokenArray);

        return $this->refreshAccessToken();
    }

    /**
     * GET Method
     *
     * @return Collection
     */
    public function get($route, $params)
    {
        try {
            $response = $this->client->get($route, ['query' => $params]);

            return json_decode($response->getBody())->data;
        } catch (\Exception $e) {
            Log::channel('myfastway')->error($e->getMessage());
        }
    }

    public function post($route, $params)
    {
        try {
            $response = $this->client->post($route, [
                'json' => $params,
                'headers' => [
                    'Authorization' => $this->refreshAccessToken(),
                ]
            ]);

            return json_decode($response->getBody())->data;
        } catch (\Exception $e) {
            Log::channel('myfastway')->error("{$e->getMessage()} Request Body: " . json_encode($params));
        }
    }

    public function getQuote($params)
    {
        $mandatoryFields = [
            'To.ContactName',
            'To.PhoneNumber',
            'To.Email',
            'To.Address.StreetAddress',
            'To.Address.Locality',
            'To.Address.StateOrProvince',
            'To.Address.PostalCode',
            'To.Address.Country'
        ];

        if ($this->validate($params, $mandatoryFields)) {
            return $this->post('/api/consignments/quote', $params);
        }
    }

    private function validate($params, $mandatoryFields)
    {
        if ($mandatoryFields) {
            $notExists = Arr::first($mandatoryFields, function ($field) use ($params) {
                return is_null(Arr::get($params, $field));
            });

            if ($notExists && $this->debug) {
                Log::channel('myfastway')->info("{$notExists} is required");
                return false;
            }
        }

        return true;
    }
}
