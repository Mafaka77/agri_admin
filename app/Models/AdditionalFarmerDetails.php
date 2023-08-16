<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdditionalFarmerDetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','farmers_id','ration_card_number','ration_card_path',
        'is_kcc_availed','kcc_card_no','kcc_renew_or_new','bank_name','branch_name',
        'year_of_amount_sanction','amount_sanction','aadhaar_card_path','bank_passbook_path',
        'date_of_data_collection','remarks'
    ];

    public function schemeApplied():HasMany
    {
        return $this->hasMany(SchemeApplied::class)->with('schemes');
    }

    public function schemes():BelongsToMany
    {
        return $this->belongsToMany(Schemes::class,'scheme_applieds')->withPivot('schemes_id');
    }
    public function farmers():BelongsTo
    {
        return $this->belongsTo(Farmers::class);
    }
}
