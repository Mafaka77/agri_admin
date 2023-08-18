<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FarmerAnimalHusbandryDetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'farmers_id','husbandry_id','location','adult_male',
        'adult_female','young_stock','total','no_of_poultry'
    ];

    public function farmerLivestock():HasOne
    {
        return $this->hasOne(FarmerLivestock::class);
    }

    public function livestock():BelongsToMany
    {
        return $this->belongsToMany(Livestock::class,'farmer_livestocks');
    }
    public function husbandryTypeOfFarm():HasOne
    {
        return $this->hasOne(HusbandryTypeOfFarm::class);
    }

    public function typeOfFarm():BelongsToMany
    {
        return $this->belongsToMany(TypeOfFarm::class,'husbandry_type_of_farms');
    }

    public function poultryTypeOfFarm():HasMany
    {
        return $this->hasMany(PoultryTypeOfFarm::class);
    }

    public function poultryFarm():BelongsToMany
    {
        return $this->belongsToMany(TypeOfPoultryFarm::class,'poultry_type_of_farms');
    }

    public function poultryTypeOfBreed():HasOne
    {
        return $this->hasOne(PoultryTypeOfBreed::class);
    }

    public function typeOfBreed():BelongsToMany
    {
        return $this->belongsToMany(TypeOfPoultryBreed::class,'poultry_type_of_breeds');
    }

    public function husbandryTypeOfBreed():HasMany
    {
        return $this->hasMany(HusbandryTypeOfBreed::class);
    }

    public function husbandryTypeBreed():BelongsToMany
    {
        return $this->belongsToMany(TypeOfBreed::class,'husbandry_type_of_breeds');
    }
}
