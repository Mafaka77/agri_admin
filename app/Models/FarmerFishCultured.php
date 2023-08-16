<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FarmerFishCultured extends Model
{
    use HasFactory;

    public function fish():BelongsTo
    {
        return $this->belongsTo(Fish::class);
    }

    public function farmerFisheries():BelongsTo
    {
        return $this->belongsTo(FarmerFisherie::class);
    }
}
