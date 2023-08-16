<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OwnershipType extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','ownership_type_name'
    ];

    public function farmerAgriLandDetails():HasOne
    {
        return $this->hasOne(FarmerAgricultureLandDetails::class);
    }
}
