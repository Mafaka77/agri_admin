<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class District extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','district_id','district_code','district_lgd_code'
    ];

    public function subDivision():HasOne
    {
        return $this->hasOne(SubDivision::class);
    }
    public function block():HasOne{
        return $this->hasOne(Block::class);
    }

    public function farmerAgriLandDetails():HasOne
    {
        return $this->hasOne(FarmerAgricultureLandDetails::class);
    }

    public function farmer():HasOne
    {
        return $this->hasOne(Farmers::class);
    }

    public function user():HasOne
    {
        return $this->hasOne(User::class);
    }

}
