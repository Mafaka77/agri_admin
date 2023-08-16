<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HusbandryTypeOfFarm extends Model
{
    use HasFactory;
    protected $fillable=[
        'type_name',
    ];

    public function farmerAnimalHusbandryDetails():BelongsTo
    {
        return $this->belongsTo(FarmerAnimalHusbandryDetails::class);
    }
}
