<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Livestock extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','livestock_name'
    ];

    public function farmerLivestock():HasMany
    {
        return $this->hasMany(FarmerLivestock::class);
    }
}
