<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmerHortiOrchard extends Model
{
    use HasFactory;
    protected $fillable=[
        'orhcards_id'
    ];

    public function orchard():BelongsTo
    {
        return $this->belongsTo(Orchards::class);
    }

    public function farmerHortiFarmDetails():BelongsTo
    {
        return $this->belongsTo(FarmerHorticultureFarmDetails::class);
    }
}
