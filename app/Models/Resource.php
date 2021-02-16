<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Resource extends Model
{
    protected $fillable = ['filepath', 'altvalue', 'msds', 'resourceable_id', 'resourceable_type'];

    public function resourceable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return Storage::disk('public')->url($this->filepath);
    }

    public function getThumbUrlAttribute()
    {
        if (Storage::disk('public')->exists("thumb/{$this->filepath}")) {
            return Storage::disk('public')->url("thumb/{$this->filepath}");
        }

        return $this->url;
    }
}
