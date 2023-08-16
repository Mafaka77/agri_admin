<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FarmerRabiCrops extends Model
{
    use HasFactory;

    public function rabiCrops():BelongsTo
    {
        return $this->belongsTo(RabiCrops::class);
    }
    public function farmerAgriLandDetails():BelongsTo
    {
        return $this->belongsTo(FarmerAgricultureLandDetails::class);
    }
}
