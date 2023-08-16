<?php

namespace App\Http\Controllers;

use App\Models\FarmerAnimalHusbandryDetails;
use App\Models\HusbandryTypeOfBreed;
use App\Models\HusbandryTypeOfFarm;
use App\Models\Livestock;
use App\Models\PoultryTypeOfFarm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmerAnimalHusbandryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,int $id)
    {
        $livestock=Livestock::query()->get();
        $farmers=$id;
        return inertia('AddFarmerAnimalHusbandry',[
            'livestock'=>$livestock,
            'farmers'=>$farmers
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
        $validate=$this->validate($request,[
            'farmers_id'=>'required',
            'husbandry_id'=>'required',
            'location'=>'required',
            'adult_male'=>'required',
            'adult_female'=>'required',
            'young_stock'=>'required',
            'total'=>'required',
            'no_of_poultry'=>'required'
        ]);
        $livestock_ids=$request->livestock_ids;
        $husbandryTypeOfBreed=$request->type_of_breed;
        $husbandryTypeOfFarm=$request->type_of_farm;
        $poultryTypeOfFarm=$request->type_of_poultry_farm;
        $poultryTypeOfBreed=$request->type_of_poultry_breed;
        DB::transaction(function () use($validate,$livestock_ids,$husbandryTypeOfBreed,$husbandryTypeOfFarm,$poultryTypeOfFarm,$poultryTypeOfBreed){
            $data=FarmerAnimalHusbandryDetails::query()->create($validate);
            $id=$data->id;
            $data->livestock()->sync($livestock_ids);
            foreach ($husbandryTypeOfBreed as $hBreed){
                $data=new HusbandryTypeOfBreed();
                $data->farmer_animal_husbandry_details_id=$id;
                $data->type_name=$hBreed;
                $data->save();

            }
            foreach ($husbandryTypeOfFarm as $hFarm){
                $data=new HusbandryTypeOfFarm();
                $data->farmer_animal_husbandry_details_id=$id;
                $data->type_name=$hFarm;
                $data->save();

            }
            foreach ($poultryTypeOfFarm as $pFarm){
                $data=new PoultryTypeOfFarm();
                $data->farmer_animal_husbandry_details_id=$id;
                $data->type_name=$pFarm;
                $data->save();
            }
            foreach ($poultryTypeOfBreed as $pBreed){
                $data=new PoultryTypeOfFarm();
                $data->farmer_animal_husbandry_details_id=$id;
                $data->type_name=$pBreed;
                $data->save();
            }
        });
        return to_route('farmer-details',[
            'farmer'=>$request->farmers_id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(FarmerAnimalHusbandryDetails $farmerAnimalHusbandryDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmerAnimalHusbandryDetails $farmerAnimalHusbandryDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmerAnimalHusbandryDetails $farmerAnimalHusbandryDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerAnimalHusbandryDetails $farmerAnimalHusbandryDetails)
    {
        //
    }
}
