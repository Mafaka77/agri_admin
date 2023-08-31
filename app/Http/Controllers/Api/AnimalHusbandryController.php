<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FarmerAnimalHusbandryDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimalHusbandryController extends Controller
{
    public function submitAnimalHusbandry(Request $request)
    {
        $data=$request->data;
        $livestock=$request->livestock;
        $farm=$request->farm;
        $breed=$request->breed;
        $poultryFarm=$request->poultryFarm;
        $poultryBreed=$request->poultryBreed;
        DB::transaction(function () use($data,$livestock,$farm,$breed,$poultryFarm,$poultryBreed){
            $husbandry=FarmerAnimalHusbandryDetails::query()->create($data);
            $husbandry->livestock()->sync($livestock);
            $husbandry->typeOfFarm()->sync($farm);
            $husbandry->husbandryTypeBreed()->sync($breed);
            $husbandry->poultryFarm()->sync($poultryFarm);
            $husbandry->typeOfBreed()->sync($poultryBreed);
        });
        return response()->json(200);
    }

    public function getAnimalHusbandry(Request $request,int $id)
    {
        $husbandry=FarmerAnimalHusbandryDetails::query()->findOrFail($id)
            ->with('livestock')
            ->with('typeOfFarm')
            ->with('husbandryTypeBreed')
            ->with('poultryFarm')
            ->with('typeOfBreed')
            ->first();
        return response()->json(['data'=>$husbandry],200);
    }

    public function updateAnimalHusbandry(Request $request,int $id)
    {
        $data=$request->data;
        $livestock=$request->livestock;
        $farm=$request->farm;
        $breed=$request->breed;
        $poultryFarm=$request->poultryFarm;
        $poultryBreed=$request->poultryBreed;
        try{
            DB::transaction(function () use($data,$livestock,$farm,$breed,$poultryFarm,$poultryBreed,$id){
                $husbandry=FarmerAnimalHusbandryDetails::query()->findOrFail($id)->first();
                $husbandry->update($data);
                $husbandry->livestock()->sync($livestock);
                $husbandry->typeOfFarm()->sync($farm);
                $husbandry->husbandryTypeBreed()->sync($breed);
                $husbandry->poultryFarm()->sync($poultryFarm);
                $husbandry->typeOfBreed()->sync($poultryBreed);
            });
            return response()->json(200);
        }catch (\Exception $ex){
            return response()->json(['message'=>'Error Occured'],500);
        }

    }

    public function deleteHusbandry(Request $request,int $id)
    {
        try{
            $husbandry=FarmerAnimalHusbandryDetails::query()->findOrFail($id)->first();
            $husbandry->delete();
            $husbandry->farmerLivestock()->delete();
            $husbandry->husbandryTypeOfFarm()->delete();
            $husbandry->husbandryTypeOfBreed()->delete();
            $husbandry->poultryTypeOfFarm()->delete();
            $husbandry->poultryTypeOfBreed()->delete();
            return response()->json(['data'=>'Successfully Deleted'],200);
        }catch (\Exception $ex){
            return response()->json(['error'=>'Error Occured'],500);
        }

    }
}
