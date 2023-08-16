<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KharifCrops extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'kharif_crops_name', 'kharif_crops_code'
    ];

    public function farmerKharifCrops(): HasOne
    {
        return $this->hasOne(FarmerKharifCrops::class);
    }

    public function farmerHortiKharif(): HasMany
    {
        return $this->hasMany(FarmerHortiKharif::class);
    }
}
