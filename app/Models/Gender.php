<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Gender extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','gender_name'
    ];

    public function farmer():HasOne
    {
        return $this->hasOne(Farmers::class);
    }
}
