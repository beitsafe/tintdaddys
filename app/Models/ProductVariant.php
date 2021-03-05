<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    protected $table = 'product_variants';
    public $timestamps = true;
    public $incrementing = true;

    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
