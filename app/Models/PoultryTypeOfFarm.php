<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoultryTypeOfFarm extends Model
{
    use HasFactory;
    protected $fillable=[
        'type_of_poultry_farm_id','farmer_animal_husbandry_details_id'
    ];

    public function farmerAnimalHusbandry():BelongsTo
    {
        return $this->belongsTo(FarmerAnimalHusbandryDetails::class);
    }

    public function typeOfPoultryFarm():BelongsTo
    {
        return $this->belongsTo(TypeOfPoultryFarm::class);
    }
}
