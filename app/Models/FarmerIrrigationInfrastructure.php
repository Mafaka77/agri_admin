<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FarmerIrrigationInfrastructure extends Model
{
    use HasFactory;
    protected $fillable=[
        'irrigation_infrastructures_id'
    ];

    public function infrastructure():BelongsTo
    {
        return $this->belongsTo(IrrigationInfrastructures::class);
    }

    public function farmerAgricultureLandDetails():BelongsTo
    {
        return $this->belongsTo(FarmerAgricultureLandDetails::class);
    }
}
