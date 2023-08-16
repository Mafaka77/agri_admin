<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LandCrop extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','crop_name'
    ];

    public function landCropsGrown():HasOne
    {
        return $this->hasOne(LandCropGrown::class);
    }
}
