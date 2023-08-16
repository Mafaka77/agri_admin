<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FarmersBankDetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','bank_name','account_number','branch_name','ifsc_code'
    ];

    public function farmers():BelongsTo
    {
        return $this->belongsTo(Farmers::class);
    }
}
