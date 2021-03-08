<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SizeShade extends Model
{
    protected $table = 'sizes_shades';
    public $timestamps = true;
    public $incrementing = true;

    use SoftDeletes;

    protected $fillable = ['size', 'shade', 'quantity', 'price'];

    public static function getVariants(Collection $collection)
    {
        return $collection->mapWithKeys(function ($i) {
            return [$i->id => $i->name];
        })->sort();
    }

    public function getNameAttribute()
    {
        return $this->size . ' x ' . $this->shade;
    }
}
