<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RabiCrops extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','rabi_crops_name','rabi_crops_code'
    ];

    public function farmerRabiCrops():HasMany
    {
        return $this->hasMany(FarmerRabiCrops::class);
    }

    public function farmerHoriRabi():HasMany
    {
        return $this->hasMany(FarmerHortiRabi::class);
    }
}
