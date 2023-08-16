<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Block extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','block_name','block_lgd_code','district_id',
    ];

    public function district():BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function farmerAgriLandDetails():HasOne
    {
        return $this->hasOne(FarmerAgricultureLandDetails::class);
    }

    public function villages():HasMany
    {
        return $this->hasMany(Village::class);
    }

    public function farmers():HasOne
    {
        return $this->hasOne(Farmers::class);
    }
}
