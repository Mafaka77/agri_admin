<?php

namespace App\Http\Controllers;

use App\Models\FarmerLandWaterConservation;
use App\Models\LandCrop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmerLandWaterConservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,int $id)
    {
        $landCrops=LandCrop::query()->get();
        $farmerId=$id;
        return inertia('AddFarmerLandWaterConservation',[
            'landCrops'=>$landCrops,
            'farmerId'=>$farmerId,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validate=$this->validate($request,[
                'farmers_id'=>'required',
                'location'=>'required',
                'total_area'=>'required',
                'crops_acres_or_hectares'=>'required'
            ]);
            $data=array_merge($validate,[ 'owner_id'=>$request->owner_id,]);
            $crops=$request->crop_ids;
            DB::transaction(function () use($data,$crops){
                $data=FarmerLandWaterConservation::query()->create($data);
                $data->landCrops()->sync($crops);
            });
            return to_route('farmer-details',[
                'farmer'=>$request->farmers_id
            ]);
        }catch (\Exception $ex){
            info($ex);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(FarmerLandWaterConservation $farmerLandWaterConservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmerLandWaterConservation $farmerLandWaterConservation,int $id)
    {
        $land=FarmerLandWaterConservation::query()->findOrFail($id)
            ->with('landCrops')
            ->first();
        return inertia('Edit/EditFarmerLandWaterPage',[
            'landData'=>$land
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmerLandWaterConservation $farmerLandWaterConservation,int $id)
    {
        try{
            $validate=$this->validate($request,[
                'farmers_id'=>'required',
                'location'=>'required',
                'total_area'=>'required',
                'crops_acres_or_hectares'=>'required'
            ]);
            $data=array_merge($validate,[ 'owner_id'=>$request->owner_id,]);
            $crops=$request->crop_ids;
            DB::transaction(function () use($data,$crops,$id){
                $land=FarmerLandWaterConservation::query()->findOrFail($id)->first();
                $land->update($data);
                $land->landCrops()->sync($crops);
            });
            return to_route('farmer-details',[
                'farmer'=>$request->farmers_id
            ]);
        }catch (\Exception $ex){
            info($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerLandWaterConservation $farmerLandWaterConservation,int $id)
    {
        $land=FarmerLandWaterConservation::query()->findOrFail($id)->first();
        DB::transaction(function () use ($land){
            $land->delete();
            $land->landCropsGrown()->delete();
        });

    }
}
