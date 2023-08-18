<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoultryTypeOfBreed extends Model
{
    use HasFactory;
    protected $fillable=[
        'farmer_animal_husbandry_details_id','type_of_poultry_breed_id'
    ];

    public function farmerAnimalHusbandry():BelongsTo
    {
        return $this->belongsTo(FarmerAnimalHusbandryDetails::class);
    }

    public function typeOfPoultryBreed():BelongsTo
    {
        return $this->belongsTo(TypeOfPoultryBreed::class);
    }
}
