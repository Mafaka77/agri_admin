<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmerHorticultureFarmDetails extends Model
{
    use HasFactory;
    protected $fillable=[
       'farmers_id', 'farmer_horticulture_id','location','kharif_acres_or_hectares','kharif_total_area',
        'rabi_acres_or_hectares','rabi_total_area','total_greenhouse_area'
    ];

    public function farmers():BelongsTo
    {
        return $this->belongsTo(Farmers::class);
    }
    public function farmerHortiOrchard():HasMany
    {
        return $this->hasMany(FarmerHortiOrchard::class);
    }

    public function farmerOrchids():BelongsToMany
    {
        return $this->belongsToMany(Orchards::class,'farmer_horti_orchards');
    }

    public function farmerHortiPlantation():HasMany
    {
        return $this->hasMany(FarmerHortiPlantation::class);
    }

    public function farmerPlantation():BelongsToMany
    {
        return $this->belongsToMany(Plantation::class,'farmer_horti_plantations');
    }
    public function farmerHortiKharif():HasMany
    {
        return $this->hasMany(FarmerHortiKharif::class);
    }
    public function farmerHortiKharifCrops():BelongsToMany
    {
        return $this->belongsToMany(KharifCrops::class,'farmer_horti_kharifs');
    }
    public function farmerHortiRabi():HasMany
    {
        return $this->hasMany(FarmerHortiRabi::class);
    }
    public function farmerHortiRabiCrops():BelongsToMany
    {
        return $this->belongsToMany(RabiCrops::class,'farmer_horti_rabis');
    }

    public function farmerGreenHousePlant():HasMany
    {
        return $this->hasMany(FarmerGreenHousePlant::class);
    }

    public function greenHousePlants():BelongsToMany
    {
        return $this->belongsToMany(GreenHousePlant::class,'farmer_green_house_plants');
    }
}
