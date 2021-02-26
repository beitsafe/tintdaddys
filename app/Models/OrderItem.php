<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    public $timestamps = true;
    public $incrementing = false;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['order_id', 'product_id', 'quantity', 'unitprice'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function getTotalAttribute()
    {
        return $this->quantity * $this->unitprice;
    }
}
