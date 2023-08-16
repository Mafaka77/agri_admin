<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Caste extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','caste'
    ];

    public function farmers():HasOne
    {
        return $this->hasOne(Farmers::class);
    }
}
