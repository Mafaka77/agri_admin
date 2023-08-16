<?php

namespace App\Http\Controllers;

use App\Models\FarmerFisherie;
use App\Models\Fish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmerFisherieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,int $id)
    {
        $fish=Fish::query()->get();
        $farmers_id=$id;
        return inertia('AddFarmerFisheries',[
            'fish'=>$fish,
            'farmers_id'=>$farmers_id
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
                'fisheries_id'=>'required',
                'location'=>'required',
                'nursery_ponds'=>'required',
                'rearing_ponds'=>'required',
                'grew_out_ponds'=>'required',
                'total_ponds'=>'required',
                'acres_or_hectares'=>'required',
                'total_area'=>'required'
            ]);
            $fish_cultured_ids=$request->fish_cultured_ids;
            $validatedData=array_merge($validate,['fish_hatchery'=>$request->fish_hatchery]);
            DB::transaction(function () use($fish_cultured_ids,$validatedData){
                $data=FarmerFisherie::query()->create($validatedData);
                $data->fish()->sync($fish_cultured_ids);
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
    public function show(FarmerFisherie $farmerFisherie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmerFisherie $farmerFisherie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmerFisherie $farmerFisherie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerFisherie $farmerFisherie)
    {
        //
    }
}
