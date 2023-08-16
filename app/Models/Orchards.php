<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orchards extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','orchards_name'
    ];

    public function farmerHortiOrchard():HasMany
    {
        return $this->hasMany(FarmerHortiOrchard::class);
    }
}
