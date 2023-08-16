<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class Farmers extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','farmer_id','full_name','dob','farmer_category_id','status','voter_no','education_qualification',
        'phone_no','aadhaar_no','gender_id','caste_id','sub_division_id','district_id',
        'village_id','block_id','relationship','relationship_name','other_income','is_farming_main_income',
        'aadhaar_verify_type','state_lgd_code','village_lgd_code','user_id','verification'

    ];
    public static function boot()
    {

        parent::boot();
        self::creating(function ($model) {
            $prefix='MZ';
            $model->farmer_id = UniqueIdGenerator::generate(['table' => 'farmers', 'field' => 'farmer_id', 'length' => 10, 'prefix' => $prefix,'suffix'=>date('Y'), 'reset_on_prefix_change' => 'both',]);
        });
    }
    public function farmerBankDetails():HasOne
    {
        return $this->hasOne(FarmersBankDetails::class);
    }

    public function caste():BelongsTo
    {
        return $this->belongsTo(Caste::class);
    }

    public function gender():BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function farmerCategory():BelongsTo
    {
        return $this->belongsTo(FarmerCategory::class);
    }

    public function district():BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function subDivision():BelongsTo
    {
        return $this->belongsTo(SubDivision::class);
    }

    public function block():BelongsTo
    {
        return $this->belongsTo(Block::class);
    }

    public function village():BelongsTo
    {
        return $this->belongsTo(Village::class);
    }
    public function farmerAgriLandDetails():HasMany
    {
        return $this->hasMany(FarmerAgricultureLandDetails::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function additionalFarmerDetail():HasMany
    {
        return $this->hasMany(AdditionalFarmerDetails::class);
    }

    public function farmerHortiFarmDetails():HasMany
    {
        return $this->hasMany(FarmerHorticultureFarmDetails::class);
    }
}
