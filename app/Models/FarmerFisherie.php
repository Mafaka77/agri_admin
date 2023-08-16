<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmerFisherie extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','fisheries_id','location','acres_or_hectares',
        'total_area','total_ponds','nursery_ponds','rearing_ponds',
        'grew_out_ponds','fish_hatchery','farmers_id'
    ];

    public function farmerFishCultured():HasMany
    {
        return $this->hasMany(FarmerFishCultured::class);
    }

    public function fish():BelongsToMany
    {
        return $this->belongsToMany(Fish::class,'farmer_fish_cultureds');
    }
}
