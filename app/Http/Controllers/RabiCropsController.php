<?php

namespace App\Http\Controllers;

use App\Models\RabiCrops;
use Illuminate\Http\Request;

class RabiCropsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rabiCrops=RabiCrops::query()->get();
        return inertia('Admin/RabiCropsPage',[
            'rabiCrops'=>$rabiCrops
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
            'rabi_crops_name'=>'required'
        ]);
        $cropsName=RabiCrops::query()->where('rabi_crops_name','=',$request->rabi_crops_name)->first();
        if($cropsName==null){
            $data=array_merge($validate,['rabi_crops_code'=>$request->rabi_crops_code]);
            RabiCrops::query()->create($data);
            return to_route('rabi-crops.index');
        }else{
            return redirect()->back()->withErrors([
                'message'=>'Rabi Crops already exists'
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(RabiCrops $rabiCrops)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RabiCrops $rabiCrops,string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate=$this->validate($request,[
            'rabi_crops_name'=>'required'
        ]);
        $data=array_merge($validate,['rabi_crops_code'=>$request->rabi_crops_code]);
        RabiCrops::query()->where('id',$id)->update($data);
        return to_route('rabi-crops.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=RabiCrops::query()->where('id',$id);
        $data->delete();
        return to_route('rabi-crops.index');
    }
}
