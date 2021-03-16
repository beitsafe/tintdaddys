<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['firstName', 'lastName', 'email', 'phone', 'abn', 'businessName', 'address', 'city', 'suburb', 'postcode', 'user_id'];
    const COUNTRIES = ['AU' => 'Australia', 'NZ' => 'New Zealand', 'IE' => 'Ireland', 'ZA' => 'South Africa'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute()
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }

    public function getFullAddressAttribute()
    {
        try {
            return implode(',', array_filter([$this->address, $this->city, $this->suburb, $this->postcode]));
        } catch (\Exception $e) {
            return null;
        }
    }

}
