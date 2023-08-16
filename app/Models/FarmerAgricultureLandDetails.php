<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FarmerAgricultureLandDetails extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','farmer_agri_id','land_owner_name','area_of_land','acres_or_hectares','latitude','longitude','altitude','landholding_documents_number',
        'land_holding_file','land_holding_file_2','land_holding_file_3','other_irrigation_infrastructure','other_farm_equipment','kharif_acres_or_hectares','kharif_total_area','rabi_acres_or_hectares',
        'rabi_total_area','farmer_id','district_id','sub_division_id','block_id','village_id','land_holding_id','ownership_type_id','farmers_id','oil_palm_plantation','oil_palm_area'
    ];

    public function farmer():BelongsTo
    {
        return $this->belongsTo(Farmers::class);
    }
    public function district():BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function village():BelongsTo
    {
        return $this->belongsTo(Village::class);
    }
    public function subDivision():BelongsTo
    {
        return $this->belongsTo(SubDivision::class);
    }
    public function block():BelongsTo
    {
        return $this->belongsTo(Block::class);
    }
    public function ownershipType():BelongsTo
    {
        return $this->belongsTo(OwnershipType::class);
    }
    public function landHolding():BelongsTo
    {
        return $this->belongsTo(LandHolding::class);
    }

    public function farmerIrrigationInfrastructure():HasMany
    {
        return $this->hasMany(FarmerIrrigationInfrastructure::class);
    }
    public function irrigationInfrastructures():BelongsToMany{
        return $this->belongsToMany(IrrigationInfrastructures::class,'farmer_irrigation_infrastructures');
    }

    public function farmerFarmEquipment():HasMany
    {
        return $this->hasMany(FarmerFarmEquipment::class);
    }

    public function farmEquipments():BelongsToMany
    {
        return $this->belongsToMany(FarmEquipment::class,'farmer_farm_equipment');
    }
    public function farmerKharifCrops():HasMany
    {
        return $this->hasMany(FarmerKharifCrops::class);
    }

    public function kharifCrops():BelongsToMany
    {
        return $this->belongsToMany(KharifCrops::class,'farmer_kharif_crops');
    }
    public function farmerRabiCrops():HasMany
    {
        return $this->hasMany(FarmerRabiCrops::class);
    }
    public function rabiCrops():BelongsToMany
    {
        return $this->belongsToMany(RabiCrops::class,'farmer_rabi_crops');
    }
}
