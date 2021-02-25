<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Installer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['longitude', 'latitude', 'name', 'phone', 'person', 'email'];

}
