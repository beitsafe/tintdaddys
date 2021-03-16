<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    protected $table = 'sizes';
    public $timestamps = true;
    public $incrementing = true;

    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

}
