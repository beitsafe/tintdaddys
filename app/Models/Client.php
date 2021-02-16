<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    protected $fillable = ['firstName', 'lastName', 'email', 'phone', 'abn', 'businessName', 'address', 'city', 'state', 'postcode', 'user_id'];

    public function users()
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
            return implode(',', array_filter([$this->address, $this->city, $this->state, $this->postcode]));
        } catch (\Exception $e) {
            return null;
        }
    }

}
