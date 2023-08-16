<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubDivision extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','sub_division_name','district_id'
    ];

    public function district():BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function farmerAgriLandDetails():HasOne
    {
        return $this->hasOne(FarmerAgricultureLandDetails::class);
    }

    public function farmer():HasOne
    {
        return $this->hasOne(Farmers::class);
    }
}
