<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TypeOfBreed extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','name'
    ];

    public function husbandryTypeOfBreed():BelongsTo
    {
        return $this->belongsTo(HusbandryTypeOfBreed::class);
    }
}
