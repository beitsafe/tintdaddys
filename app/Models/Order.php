<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['billing', 'instructions', 'subtotal', 'paymentid', 'responseinfos', 'user_id', 'invoiceno'];
    protected $casts = ['billing' => 'array', 'responseinfos' => 'array'];


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($shop) {
            if (!$shop->exists) {
                $last = self::latest()->first();
                $last_num = @$last->invoiceno ?: 1000;
                $shop->invoiceno = $last_num + 1;
            }
        });
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return$this->belongsTo(User::class);
    }

    public function getTotalAttribute()
    {
        return $this->subtotal;
    }

    public function getInvoiceAttribute()
    {
        return "INV{$this->invoiceno}";
    }

    public function getBillingNameAttribute()
    {
        $billing = $this->billing;
        return trim(@$billing['firstname'] . " " . @$billing['lastname']);
    }

    public function getBillingEmailAttribute()
    {
        return @$this->billing['email'];
    }

}

