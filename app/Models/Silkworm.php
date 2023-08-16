<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Silkworm extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','silkworm_name'
    ];

    public function silkwormReared():HasMany
    {
        return $this->hasMany(SilkwormReared::class);
    }
}
