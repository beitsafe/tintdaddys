<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['email', 'phone', 'organisation', 'address', 'city', 'state', 'postcode', 'user_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
