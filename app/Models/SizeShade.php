<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SizeShade extends Model
{
    protected $table = 'sizes_shades';
    public $timestamps = true;
    public $incrementing = true;

    use SoftDeletes;

    protected $fillable = ['size', 'shade', 'quantity', 'price'];
}
