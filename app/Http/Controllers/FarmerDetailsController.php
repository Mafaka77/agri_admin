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
use App\Models\FarmersFarmDetails;
use Illuminate\Http\Request;

class FarmerDetailsController extends Controller
{
    public function index(Request $request,int $farmer)
    {
        $basicInfo=Farmers::query()->where('id',$farmer)->get();
        $farmDetails=FarmerAgricultureLandDetails::query()->where('farmers_id',$farmer)->with('district')->get();
        $additionalDetails=AdditionalFarmerDetails::query()->where('farmers_id',$farmer)->with('farmers')->get();
        $farmerHortiDetails=FarmerHorticultureFarmDetails::query()->where('farmers_id',$farmer)->with('farmers')->get();
        $farmerLandWaterConservation=FarmerLandWaterConservation::query()->where('farmers_id',$farmer)->get();
        $farmerFish=FarmerFisherie::query()->where('farmers_id',$farmer)->get();
        $animalHusbandry=FarmerAnimalHusbandryDetails::query()->where('farmers_id',$farmer)->get();
        $farmerSericulture=FarmerSericultureDetails::query()->where('farmers_id',$farmer)->get();
        $data=Farmers::query()->where('id','=',$farmer)->first();
        if ($additionalDetails->count()>0 && $farmDetails->count()>0){
            Farmers::query()->where('id',$farmer)->update(['status'=>'Complete']);
        }
        return inertia('FarmerDetailPage',[
            'animalHusbandry'=>$animalHusbandry,
            'farmerFish'=>$farmerFish,
            'additionalDetails'=>$additionalDetails,
            'farmerHortiDetails'=>$farmerHortiDetails,
            'farmerLandWaterConservation'=>$farmerLandWaterConservation,
            'farmerSericulture'=>$farmerSericulture,
            'farmDetails'=>$farmDetails,
            'basicInfo'=>$basicInfo,
            'farmer'=>$data,
            'farmer_id'=>$farmer
        ]);
    }

    public function toFarmerAgricultureLand(string $id)
    {
        info($id);
        return to_route('to-farmer-agriculture-land',[
            'farmer'=>$id
        ]);
    }

    public function submitForApproval(Request $request,int $id)
    {
        $farmer=Farmers::query()->where('id',$id)->first();
        $farmer->update(['verification'=>'Submitted']);
        return to_route('manage-farmer');
    }
}
