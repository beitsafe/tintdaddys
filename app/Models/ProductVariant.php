<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    protected $table = 'product_variants';
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'product_id', 'size_id', 'shade_id', 'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function shade()
    {
        return $this->belongsTo(Shade::class, 'shade_id');
    }

    public function getNameAttribute()
    {
        return $this->product->name . ' - ' . $this->size->name . ' * ' . $this->shade->name;
    }
}
