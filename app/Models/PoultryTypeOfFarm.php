<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoultryTypeOfFarm extends Model
{
    use HasFactory;
    protected $fillable=[
        'type_name'
    ];

    public function farmerAnimalHusbandry():BelongsTo
    {
        return $this->belongsTo(FarmerAnimalHusbandryDetails::class);
    }
}
