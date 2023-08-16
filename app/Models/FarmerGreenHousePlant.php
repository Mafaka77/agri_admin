<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FarmerGreenHousePlant extends Model
{
    use HasFactory;
    protected $fillable=[];

    public function greenHousePlant():BelongsTo
    {
        return $this->belongsTo(GreenHousePlant::class);
    }

    public function farmerHorticultureFarmDetail():BelongsTo
    {
        return $this->belongsTo(FarmerHorticultureFarmDetails::class);
    }
}
