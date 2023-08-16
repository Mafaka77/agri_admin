<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LandCropGrown extends Model
{
    use HasFactory;
    public function landCrops():BelongsTo
    {
        return $this->belongsTo(LandCrop::class);
    }

    public function farmerLandWaterConservation():BelongsTo
    {
        return $this->belongsTo(FarmerLandWaterConservation::class);
    }
}
