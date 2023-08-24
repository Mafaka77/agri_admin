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
use Illuminate\Support\Facades\DB;

class SupervisorApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        return inertia('Supervisor/SupervisorApprovalPage',[
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

    public function approve(Request $request,int $id)
    {
        $farmer=Farmers::query()->where('id',$id)->first();
        $farmer->update(['verification'=>'Approved']);
        return to_route('supervisor-approval-index',$id);
    }

    public function reject(Request $request,int $id)
    {
        $message=$request->data;
        $farmer=Farmers::query()->where('id',$id)->first();
        $farmer->update(['verification'=>'Rejected','rejection_note'=>$message]);
        return to_route('supervisor-approval-index',$id);

    }
}
