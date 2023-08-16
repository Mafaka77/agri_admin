<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FarmerHortiPlantation extends Model
{
    use HasFactory;
    protected $fillable=[
        'plantation_id','farmer_horticulture_farm_details_id'
    ];

    public function plantation():BelongsTo
    {
        return $this->belongsTo(Plantation::class);
    }

    public function farmerHortiFarmDetails():BelongsTo
    {
        return $this->belongsTo(FarmerHorticultureFarmDetails::class);
    }
}
