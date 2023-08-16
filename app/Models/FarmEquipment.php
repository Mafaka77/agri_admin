<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FarmEquipment extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','equipment_name'
    ];

    public function farmerFarmEquipment():HasOne
    {
        return $this->hasOne(FarmerFarmEquipment::class);
    }
}
