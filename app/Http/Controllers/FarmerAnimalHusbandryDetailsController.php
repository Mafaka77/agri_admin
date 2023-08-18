<?php

namespace App\Http\Controllers;

use App\Models\FarmerAnimalHusbandryDetails;
use App\Models\HusbandryTypeOfBreed;
use App\Models\HusbandryTypeOfFarm;
use App\Models\Livestock;
use App\Models\PoultryTypeOfFarm;
use App\Models\TypeOfBreed;
use App\Models\TypeOfFarm;
use App\Models\TypeOfPoultryBreed;
use App\Models\TypeOfPoultryFarm;
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
        $typeOfBreed=TypeOfBreed::query()->get();
        $typeOfFarm=TypeOfFarm::query()->get();
        $poultryBreed=TypeOfPoultryBreed::query()->get();
        $poultryFarm=TypeOfPoultryFarm::query()->get();
        $farmers=$id;
        return inertia('AddFarmerAnimalHusbandry',[
            'livestock'=>$livestock,
            'farmers'=>$farmers,
            'typeOfBreed'=>$typeOfBreed,
            'typeOfFarm'=>$typeOfFarm,
            'poultryBreed'=>$poultryBreed,
            'poultryFarm'=>$poultryFarm

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
            'location'=>'required',
            'adult_male'=>'required',
            'adult_female'=>'required',
            'young_stock'=>'required',
            'total'=>'required',
            'no_of_poultry'=>'required'
        ]);
        $livestock_ids=$request->livestock_ids;
        $husbandryTypeOfBreed=$request->type_of_breeds;
        $husbandryTypeOfFarm=$request->type_of_farms;
        $poultryTypeOfFarm=$request->type_of_poultry_farms;
        $poultryTypeOfBreed=$request->type_of_poultry_breeds;
        $data=array_merge($validate,['husbandry_id'=>$request->husbandry_id]);
        DB::transaction(function () use($data,$livestock_ids,$husbandryTypeOfBreed,$husbandryTypeOfFarm,$poultryTypeOfFarm,$poultryTypeOfBreed){
            $data=FarmerAnimalHusbandryDetails::query()->create($data);
            $data->livestock()->sync($livestock_ids);
            $data->typeOfFarm()->sync($husbandryTypeOfFarm);
            $data->husbandryTypeBreed()->sync($husbandryTypeOfBreed);
            $data->poultryFarm()->sync($poultryTypeOfFarm);
            $data->typeOfBreed()->sync($poultryTypeOfBreed);
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
    public function edit(FarmerAnimalHusbandryDetails $farmerAnimalHusbandryDetails,int $id)
    {
        $livestock=Livestock::query()->get();
        $animal=FarmerAnimalHusbandryDetails::query()->where('id',$id)
            ->with('livestock')
            ->with('husbandryTypeBreed')
            ->with('typeOfFarm')
            ->with('poultryFarm')
            ->with('typeOfBreed')
            ->first();
        return inertia('Edit/EditFarmerAnimalHusbandryPage',[
            'animalData'=>$animal,
            'livestock'=>$livestock,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmerAnimalHusbandryDetails $farmerAnimalHusbandryDetails,int $id)
    {
        $validate=$this->validate($request,[
            'farmers_id'=>'required',
            'location'=>'required',
            'adult_male'=>'required',
            'adult_female'=>'required',
            'young_stock'=>'required',
            'total'=>'required',
            'no_of_poultry'=>'required'
        ]);
        $livestock_ids=$request->livestock_ids;
        $husbandryTypeOfBreed=$request->type_of_breeds;
        $husbandryTypeOfFarm=$request->type_of_farms;
        $poultryTypeOfFarm=$request->type_of_poultry_farms;
        $poultryTypeOfBreed=$request->type_of_poultry_breeds;
        $data=array_merge($validate,['husbandry_id'=>$request->husbandry_id]);
        DB::transaction(function () use($data,$livestock_ids,$husbandryTypeOfBreed,$husbandryTypeOfFarm,$poultryTypeOfFarm,$poultryTypeOfBreed,$id){

            $animal=FarmerAnimalHusbandryDetails::query()->findOrFail($id)->first();
            $animal->update($data);
            $animal->livestock()->sync($livestock_ids);
            $animal->typeOfFarm()->sync($husbandryTypeOfFarm);
            $animal->husbandryTypeBreed()->sync($husbandryTypeOfBreed);
            $animal->poultryFarm()->sync($poultryTypeOfFarm);
            $animal->typeOfBreed()->sync($poultryTypeOfBreed);
        });
        return to_route('farmer-details',[
            'farmer'=>$request->farmers_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerAnimalHusbandryDetails $farmerAnimalHusbandryDetails,int $id)
    {
        $husbandry=FarmerAnimalHusbandryDetails::query()->findOrFail($id)->first();
        $farmers_id=$husbandry->farmers_id;
        DB::transaction(function () use ($id,$husbandry){
            $husbandry->delete();
            $husbandry->farmerLivestock()->delete();
            $husbandry->husbandryTypeOfFarm()->delete();
            $husbandry->poultryTypeOfFarm()->delete();
            $husbandry->poultryTypeOfBreed()->delete();
            $husbandry->husbandryTypeOfBreed()->delete();
        });
        return to_route('farmer-details',[
            'farmer'=>$farmers_id
        ]);
    }
}
