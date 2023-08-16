<?php

namespace App\Http\Controllers;

use App\Models\FarmerHorticultureFarmDetails;
use App\Models\FarmerHortiKharif;
use App\Models\GreenHousePlant;
use App\Models\KharifCrops;
use App\Models\Orchards;
use App\Models\Plantation;
use App\Models\RabiCrops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmerHorticultureFarmDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,int $id)
    {
        $plantation=Plantation::query()->get();
        $orchards=Orchards::query()->get();
        $kharifCrops=KharifCrops::query()->get();
        $rabiCrops=RabiCrops::query()->get();
        $greenHouse=GreenHousePlant::query()->get();
        return inertia('AddFarmerHorticulturePage',[
            'farmer_id'=>$id,
            'kharifCrops'=>$kharifCrops,
            'rabiCrops'=>$rabiCrops,
            'plantation'=>$plantation,
            'orchards'=>$orchards,
            'greenHouse'=>$greenHouse,
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
        try {
            $validate=$this->validate($request,[
                'farmers_id'=>'required',
                'farmer_horticulture_id'=>'required',
                'location'=>'required',
            ]);
            $kharifCrops=$request->kharif_crop_ids;
            $rabiCrops=$request->rabi_crop_ids;
            $orchards=$request->orchard_ids;
            $plantation=$request->plantation_ids;
            $greenHouse=$request->greenhouse_ids;
            $data=array_merge($validate,['kharif_total_area'=>$request->kharif_total_area,'kharif_acres_or_hectares'=>$request->kharif_acres_or_hectares,
                'rabi_total_area'=>$request->rabi_total_area,'rabi_acres_or_hectares'=>$request->rabi_acres_or_hectares,
            ]);
            DB::transaction(function () use($data,$kharifCrops,$rabiCrops,$orchards,$plantation,$greenHouse){
                $farmerHorti=FarmerHorticultureFarmDetails::query()->create($data);
                $farmerHorti->farmerHortiKharifCrops()->sync($kharifCrops);
                $farmerHorti->farmerHortiRabiCrops()->sync($rabiCrops);
                $farmerHorti->farmerPlantation()->sync($plantation);
                $farmerHorti->farmerOrchids()->sync($orchards);
                $farmerHorti->greenHousePlants()->sync($greenHouse);
            });
            return to_route('farmer-details',[
                 'farmer'=>$request->farmers_id
            ]);
        }catch (\Exception $ex){
            return redirect()->back()->withErrors(['message'=>$ex]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(FarmerHorticultureFarmDetails $farmerHorticultureFarmDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmerHorticultureFarmDetails $farmerHorticultureFarmDetails,int $id)
    {
        $horti=FarmerHorticultureFarmDetails::query()->findOrFail($id)
            ->with('farmerHortiKharifCrops')
            ->with('farmerHortiRabiCrops')
            ->with('farmerPlantation')
            ->with('farmerOrchids')
            ->with('greenHousePlants')
            ->first();
        info($horti);
        return inertia('Edit/EditFarmerHorticulturePage',[
            'hortiData'=>$horti
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmerHorticultureFarmDetails $farmerHorticultureFarmDetails,int $id)
    {
        try {
            $validate=$this->validate($request,[
                'farmers_id'=>'required',
                'location'=>'required',
            ]);
            $kharifCrops=$request->kharif_crop_ids;
            $rabiCrops=$request->rabi_crop_ids;
            $orchards=$request->orchard_ids;
            $plantation=$request->plantation_ids;
            $greenHouse=$request->greenhouse_ids;
            $data=array_merge($validate,['farmer_horticulture_id'=>$request->farmer_horticulture_id,'kharif_total_area'=>$request->kharif_total_area,'kharif_acres_or_hectares'=>$request->kharif_acres_or_hectares,
                'rabi_total_area'=>$request->rabi_total_area,'rabi_acres_or_hectares'=>$request->rabi_acres_or_hectares,
            ]);
            DB::transaction(function () use($data,$kharifCrops,$rabiCrops,$orchards,$plantation,$greenHouse,$id){
                $farmerHorti=FarmerHorticultureFarmDetails::query()->findOrFail($id);
                $farmerHorti->update($data);
                $farmerHorti->farmerHortiKharifCrops()->sync($kharifCrops);
                $farmerHorti->farmerHortiRabiCrops()->sync($rabiCrops);
                $farmerHorti->farmerPlantation()->sync($plantation);
                $farmerHorti->farmerOrchids()->sync($orchards);
                $farmerHorti->greenHousePlants()->sync($greenHouse);
            });
            return to_route('farmer-details',[
                'farmer'=>$request->farmers_id
            ]);
        }catch (\Exception $ex){
            return redirect()->back()->withErrors(['message'=>$ex]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerHorticultureFarmDetails $farmerHorticultureFarmDetails,int $id)
    {
        $horti=FarmerHorticultureFarmDetails::query()->findOrFail($id)->first();
        $farmers_id=$horti->farmers_id;
        DB::transaction(function () use ($horti,$id){
            $horti->delete();
            $horti->farmerHortiKharif()->delete();
            $horti->farmerHortiRabi()->delete();
            $horti->farmerHortiPlantation()->delete();
            $horti->farmerHortiOrchard()->delete();
            $horti->farmerGreenHousePlant()->delete();
        });
        return to_route('farmer-details',[
            'farmer'=>$farmers_id
        ]);

    }
}
