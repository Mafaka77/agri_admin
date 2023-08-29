<?php

namespace App\Http\Controllers;

use App\Models\AdditionalFarmerDetails;
use App\Models\FarmerAgricultureLandDetails;
use App\Models\FarmerAnimalHusbandryDetails;
use App\Models\FarmerFisherie;
use App\Models\FarmerHorticultureFarmDetails;
use App\Models\FarmerLandWaterConservation;
use App\Models\Farmers;
use App\Models\FarmerSericultureDetails;
use Illuminate\Http\Request;

class AdminViewFarmerDetailController extends Controller
{
    public function index(Request $request,int $id)
    {
        $basicInfo=Farmers::query()
            ->with('farmerCategory')
            ->with('district')
            ->with('subDivision')
            ->with('block')
            ->with('village')
            ->with('farmerBankDetails')
            ->where('id',$id)
            ->first();
        $agriLand=FarmerAgricultureLandDetails::query()
            ->with('landHolding')
            ->with('district')
            ->with('subDivision')
            ->with('block')
            ->with('village')
            ->with('ownershipType')
            ->with('irrigationInfrastructures')
            ->with('farmEquipments')
            ->with('kharifCrops')
            ->with('rabiCrops')
            ->where('farmers_id',$id)
            ->get();
        $additional=AdditionalFarmerDetails::query()
            ->with('schemeApplied')
            ->where('farmers_id',$id)
            ->first();
        $horticulture=FarmerHorticultureFarmDetails::query()
            ->with('farmerHortiKharifCrops')
            ->with('farmerHortiRabiCrops')
            ->with('farmerOrchids')
            ->with('farmerPlantation')
            ->with('greenHousePlants')
            ->where('farmers_id',$id)
            ->get();
        $landWater=FarmerLandWaterConservation::query()
            ->with('landCrops')
            ->where('farmers_id',$id)
            ->get();
        $fisheries=FarmerFisherie::query()
            ->with('fish')
            ->where('farmers_id',$id)
            ->get();
        $husbandry=FarmerAnimalHusbandryDetails::query()
            ->with('livestock')
            ->with('typeOfFarm')
            ->with('poultryFarm')
            ->with('typeOfBreed')
            ->with('husbandryTypeBreed')
            ->where('farmers_id',$id)
            ->get();
        $sericulture=FarmerSericultureDetails::query()
            ->with('silkworm')
            ->where('farmers_id',$id)
            ->get();
        return inertia('Admin/AdminViewFarmerDetails',[
            'basicInfo'=>$basicInfo,
            'agriLand'=>$agriLand,
            'additional'=>$additional,
            'horticulture'=>$horticulture,
            'landWater'=>$landWater,
            'fisheries'=>$fisheries,
            'husbandry'=>$husbandry,
            'sericulture'=>$sericulture,
        ]);
    }
}
