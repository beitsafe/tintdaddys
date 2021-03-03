<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warranty extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [''];

    protected $dates = ['vehicleInstallationDate'];

    public function signature()
    {
        return $this->morphOne(Resource::class,'resourceable');
    }

    public function setVehicleInstallationDateAttribute($value)
    {
        if ($value) {
            $this->attributes['vehicleInstallationDate'] = Carbon::createFromFormat('d/m/Y', $value);
        }
    }
}
