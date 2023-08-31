<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FarmerLandWaterConservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmerLandWaterController extends Controller
{
    public function submitLandWater(Request $request)
    {
        $landData=$request->data;
        $landCrops=$request->landCrops;
        DB::transaction(function () use($landCrops,$landData){
            $land=FarmerLandWaterConservation::query()->create($landData);
            $land->landCrops()->sync($landCrops);
        });
        return response()->json(200);
    }

    public function getLandWater(Request $request)
    {
        $id=$request->id;
        $landWater=FarmerLandWaterConservation::query()->where('id',$id)
            ->with('landCrops')
            ->first();
        return response()->json(['data'=>$landWater],200);
    }

    public function updateLandWater(Request $request,int $id)
    {
        $landData=$request->data;
        $landCrops=$request->landCrops;
        DB::transaction(function () use($landCrops,$landData,$id){
            $land=FarmerLandWaterConservation::query()->findOrFail($id)->first();
            $land->update($landData);
            $land->landCrops()->sync($landCrops);
        });
    }

    public function deleteLandWater(Request $request,int $id)
    {
        $land=FarmerLandWaterConservation::query()->where('id',$id)->first();
        $land->delete();
        $land->landCropsGrown()->delete();
        return response()->json(['message'=>'Success'],200);
    }
}
