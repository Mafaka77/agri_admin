<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FarmerKharifCrops extends Model
{
    use HasFactory;
    protected $fillable=[
        'kharif_crops_id','farmer_horticulture_farm_details_id'
    ];

    public function kharifCrops():BelongsTo
    {
        return $this->belongsTo(KharifCrops::class);
    }

    public function farmerAgriLandDetails():BelongsTo
    {
        return $this->belongsTo(FarmerAgricultureLandDetails::class);
    }
}
