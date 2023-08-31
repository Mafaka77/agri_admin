<?php

namespace App\Http\Controllers;

use App\Models\GreenHousePlant;
use Illuminate\Http\Request;

class GreenHousePlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants=GreenHousePlant::query()->get();
        return inertia('Admin/ManageGreenhousePlants',[
            'plants'=>$plants
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
        $validate=$request->validate([
            'name'=>'required'
        ]);
        GreenHousePlant::query()->firstOrCreate($validate);
        return to_route('manage-greenhouse-plants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(GreenHousePlant $greenHousePlant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GreenHousePlant $greenHousePlant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GreenHousePlant $greenHousePlant,int $id)
    {
        $validate=$request->validate([
            'name'=>'required'
        ]);
        $plant=GreenHousePlant::query()->where('id',$id)->first();
        $plant->update($validate);
        return to_route('manage-greenhouse-plants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GreenHousePlant $greenHousePlant,int $id)
    {
        $plant=GreenHousePlant::query()->where('id',$id)->first();
        $plant->delete();
        return to_route('manage-greenhouse-plants.index');
    }
}
