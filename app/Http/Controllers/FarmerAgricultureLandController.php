<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\FarmEquipment;
use App\Models\IrrigationInfrastructures;
use App\Models\KharifCrops;
use App\Models\LandHolding;
use App\Models\OwnershipType;
use App\Models\RabiCrops;
use Illuminate\Http\Request;

class FarmerAgricultureLandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $district=District::query()->get();
        $ownership_type=OwnershipType::query()->get();
        $irrigation=IrrigationInfrastructures::query()->get();
        $equipment=FarmEquipment::query()->get();
        $kharifCrops=KharifCrops::query()->get();
        $rabiCrops=RabiCrops::query()->get();
        $landHolding=LandHolding::query()->get();
        return inertia('AddFarmerAgricultureLand',[
            'district'=>$district,
            'ownership_type'=>$ownership_type,
            'irrigation'=>$irrigation,
            'equipment'=>$equipment,
            'kharifCrops'=>$kharifCrops,
            'rabiCrops'=>$rabiCrops,
            'landHolding'=>$landHolding
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
