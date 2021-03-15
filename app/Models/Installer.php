<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Installer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['longitude', 'latitude', 'name', 'phone', 'person', 'email', 'address', 'city', 'state', 'postcode'];

    public function getFullAddressAttribute()
    {
        try {
            return implode(',', array_filter([$this->address, $this->city, $this->state, $this->postcode]));
        } catch (\Exception $e) {
            return null;
        }
    }

}
