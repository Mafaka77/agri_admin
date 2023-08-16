<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plantation extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','plantation_name'
    ];

    public function farmerHortiPlantation():HasMany
    {
        return $this->hasMany(FarmerHortiPlantation::class);
    }
}
