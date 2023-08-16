<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schemes extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','scheme_name'
    ];

    public function schemeApplied():HasMany
    {
        return $this->hasMany(SchemeApplied::class);
    }



}
