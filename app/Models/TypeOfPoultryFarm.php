<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TypeOfPoultryFarm extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','name'
    ];
    public function poultryTypeOfFarm():BelongsTo
    {
        return $this->belongsTo(PoultryTypeOfFarm::class);
    }
}
