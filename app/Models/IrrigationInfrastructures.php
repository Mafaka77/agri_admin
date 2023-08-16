<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class IrrigationInfrastructures extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','irrigation_infrastructures_name'
    ];

    public function farmerIrrigationInfrastructure():HasOne
    {
        return $this->hasOne(FarmerIrrigationInfrastructure::class);
    }
}

