<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmerSericultureDetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','sericulture_id','location','acres_or_hectares',
        'total_area','size_of_rearing_unit','plantation_acres_or_hectares',
        'plantation_total_area','farmers_id'
    ];

    public function silkwormReared():HasMany
    {
        return $this->hasMany(SilkwormReared::class);
    }

    public function silkworm():BelongsToMany
    {
        return $this->belongsToMany(Silkworm::class,'silkworm_reareds');
    }
}
