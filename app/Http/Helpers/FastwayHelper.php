<?php

namespace App\Http\Helpers;


use App\Models\Setting;

class FastwayHelper
{
    public $isEnabled = false;

    private $apiVersion = '/v6';

    private $apiKey;

    private $client;

    public $error;


    public function __construct()
    {
        $this->apiKey = env('FASTWAY_APIKEY');
        if (!$this->apiKey) {
            return false;
        }
        $this->isEnabled = true;

        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * GET Method
     *
     * @return Collection
     */
    public function get($route, $params)
    {
        if (!$this->apiKey) {
            return false;
        }

        try {
            $params['api_key'] = $this->apiKey;
            $response = $this->client->request('GET', 'https://api.fastway.org' . $this->apiVersion . $route, ['query' => $params]);
            $content = json_decode($response->getBody());
            return collect($content->result);
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
        }

        return collect();
    }
}
