<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdditionalFarmerDetails;
use App\Models\FarmerAgricultureLandDetails;
use App\Models\FarmerAnimalHusbandryDetails;
use App\Models\FarmerFisherie;
use App\Models\FarmerHorticultureFarmDetails;
use App\Models\FarmerLandWaterConservation;
use App\Models\FarmerSericultureDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmerAgriLandController extends Controller
{
    public function getFarmerFarms(Request $request)
    {
        $farmer_id=$request->id;
        $farms=FarmerAgricultureLandDetails::query()->where('farmers_id','=',$farmer_id)
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
            ->get();
        $additional=AdditionalFarmerDetails::query()->where('farmers_id','=',$farmer_id)->get();
        $horticulture=FarmerHorticultureFarmDetails::query()->where('farmers_id','=',$farmer_id)->get();
        $landWater=FarmerLandWaterConservation::query()->where('farmers_id',$farmer_id)->get();
        $fisheries=FarmerFisherie::query()->where('farmers_id',$farmer_id)->get();
        $animalHusbandry=FarmerAnimalHusbandryDetails::query()->where('farmers_id',$farmer_id)->get();
        $sericulture=FarmerSericultureDetails::query()->where('farmers_id',$farmer_id)->get();
        return response()->json(['farms'=>$farms,'additional'=>$additional,
            'horticulture'=>$horticulture,
            'landWater'=>$landWater,
            'fisheries'=>$fisheries,
            'husbandry'=>$animalHusbandry,
            'sericulture'=>$sericulture
            ],200);

    }

    public function uploadLandHolding(Request $request)
    {

        try{
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('uploads', $imageName, 'public');
                return response()->json(['data' => $imagePath], 200);
            } else {
                return response()->json(['message' => 'Image upload failed'], 400);
            }
        }catch (\Exception $ex){
            info($ex);
        }

    }
    public function submitAgriFarm(Request $request)
    {
        try{
            $data=$request->data;
            $irrigationInfrastructure=$request->infrastructure;
            $equipment=$request->equipment;
            $kharifCrop=$request->kharifCrop;
            $rabiCrop=$request->rabiCrop;
            DB::transaction(function () use($data,$irrigationInfrastructure,$equipment,$kharifCrop,$rabiCrop){
                $agriFarm=FarmerAgricultureLandDetails::query()->create($data);
                $agriFarm->irrigationInfrastructures()->sync($irrigationInfrastructure);
                $agriFarm->farmEquipments()->sync($equipment);
                $agriFarm->kharifCrops()->sync($kharifCrop);
                $agriFarm->rabiCrops()->sync($rabiCrop);
            });
            return response()->json(200);
        }catch (\Exception $ex){
            return response()->json(500);
        }
    }

    public function getFarmerAgriLand(Request $request)
    {
        try{
            $id=$request->id;
            $farm=FarmerAgricultureLandDetails::query()->where('id','=',$id)
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
                ->first();
            info(json_encode($farm));
            return response()->json(['data'=>$farm],200);
        }catch (\Exception $ex){
            return response()->json(500);
        }

    }

    public function updateAgriLandDetail(Request $request)
    {


        $farm=FarmerAgricultureLandDetails::findOrfail($request->id);
        $data=$request->data;
        $irrigationInfrastructure=$request->infrastructure;
        $equipment=$request->equipment;
        $kharifCrop=$request->kharifCrop;
        $rabiCrop=$request->rabiCrop;
        DB::transaction(function () use($data,$irrigationInfrastructure,$equipment,$kharifCrop,$rabiCrop,$farm){
            $farm->update($data);
            $farm->irrigationInfrastructures()->sync($irrigationInfrastructure);
            $farm->farmEquipments()->sync($equipment);
            $farm->kharifCrops()->sync($kharifCrop);
            $farm->rabiCrops()->sync($rabiCrop);
        });
    }

    public function deleteAgriFarmDetail(Request $request,int $id)
    {

    }
}
