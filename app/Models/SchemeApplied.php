<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchemeApplied extends Model
{
    use HasFactory;
    protected $fillable=[
        'scheme_name','schemes_id','additional_farmer_details_id','availed','amount',
    ];

    public function schemes():BelongsTo
    {
        return $this->belongsTo(Schemes::class);
    }

    public function additionalFarmerDetails():BelongsTo
    {
        return $this->belongsTo(AdditionalFarmerDetails::class);
    }
}
