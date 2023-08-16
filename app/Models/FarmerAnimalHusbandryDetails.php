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
    public function husbandryTypeOfFarm():HasMany
    {
        return $this->hasMany(HusbandryTypeOfFarm::class);
    }

    public function poultryTypeOfFarm():HasMany
    {
        return $this->hasMany(PoultryTypeOfFarm::class);
    }

    public function poultryTypeOfBreed():HasMany
    {
        return $this->hasMany(PoultryTypeOfBreed::class);
    }

    public function husbandryTypeOfBreed():HasMany
    {
        return $this->hasMany(HusbandryTypeOfBreed::class);
    }
}
