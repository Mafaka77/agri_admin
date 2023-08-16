<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FarmerHortiRabi extends Model
{
    use HasFactory;
    protected $fillable=[
    'rabi_crops_id'
    ];

    public function rabiCrops():BelongsTo
    {
        return $this->belongsTo(RabiCrops::class);
    }

    public function farmerHortiFarmDetails():BelongsTo
    {
        return $this->belongsTo(FarmerHorticultureFarmDetails::class);
    }
}
