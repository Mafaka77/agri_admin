<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TypeOfPoultryBreed extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','name'
    ];

    public function poultryTypeOfBreed():BelongsTo
    {
        return $this->belongsTo(PoultryTypeOfBreed::class);
    }
}
