<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fish extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','fish_name'
    ];

    public function farmerFishCultured():HasOne
    {
        return $this->hasOne(FarmerFishCultured::class);
    }
}
