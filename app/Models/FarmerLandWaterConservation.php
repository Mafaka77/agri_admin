<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmerLandWaterConservation extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','owner_id','location','total_area','crops_acres_or_hectares','farmers_id'
    ];

    public function landCropsGrown():HasMany
    {
        return $this->hasMany(LandCropGrown::class);
    }

    public function landCrops():BelongsToMany
    {
        return $this->belongsToMany(LandCrop::class,'land_crop_growns');
    }
}
