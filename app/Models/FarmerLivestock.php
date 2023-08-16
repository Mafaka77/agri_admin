<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmerLivestock extends Model
{
    use HasFactory;

    public function livestock():BelongsTo
    {
        return $this->belongsTo(Livestock::class);
    }

    public function farmerAnimalHusbandry():BelongsTo
    {
        return $this->belongsTo(FarmerAnimalHusbandryDetails::class);
    }
}
