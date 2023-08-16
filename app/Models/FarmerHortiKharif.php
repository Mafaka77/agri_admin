<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FarmerHortiKharif extends Model
{
    use HasFactory;
    protected $fillable=[
        'kharif_crops_id','farmer_horticulture_farm_details_id'
    ];

    public function farmerHortiFarmDetails():BelongsTo
    {
        return $this->belongsTo(FarmerHorticultureFarmDetails::class);
    }

    public function kharifCrops():BelongsTo
    {
        return $this->belongsTo(KharifCrops::class);
    }
}
