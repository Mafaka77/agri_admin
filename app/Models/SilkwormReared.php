<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SilkwormReared extends Model
{
    use HasFactory;

    public function silkworm():BelongsTo
    {
        return $this->belongsTo(Silkworm::class);
    }

    public function farmerSericulture():BelongsTo
    {
        $this->belongsTo(FarmerSericultureDetails::class);
    }
}
