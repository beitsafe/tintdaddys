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

    public function sizeshade()
    {
        return $this->belongsTo(SizeShade::class,'size_shade_id');
    }

    public function getNameAttribute()
    {
        return $this->product->name . ' - ' . $this->sizeshade->name;
    }
}
