<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HusbandryTypeOfFarm extends Model
{
    use HasFactory;
    protected $fillable=[

    ];

    public function farmerAnimalHusbandryDetails():BelongsTo
    {
        return $this->belongsTo(FarmerAnimalHusbandryDetails::class);
    }

    public function typeOfFarm():BelongsTo
    {
        return $this->belongsTo(TypeOfFarm::class);
    }
}
