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
                'owner_id'=>'required',
                'location'=>'required',
                'total_area'=>'required',
                'crops_acres_or_hectares'=>'required'
            ]);
            $crops=$request->crop_ids;
            DB::transaction(function () use($validate,$crops){
                $data=FarmerLandWaterConservation::query()->create($validate);
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
    public function edit(FarmerLandWaterConservation $farmerLandWaterConservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmerLandWaterConservation $farmerLandWaterConservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerLandWaterConservation $farmerLandWaterConservation)
    {
        //
    }
}
