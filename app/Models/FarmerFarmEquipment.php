<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FarmerFarmEquipment extends Model
{
    use HasFactory;

    public function farmEquipment():BelongsTo
    {
        return $this->belongsTo(FarmEquipment::class);
    }

    public function farmerAgriLandDetails():BelongsTo
    {
        return $this->belongsTo(FarmerAgricultureLandDetails::class);
    }
}
