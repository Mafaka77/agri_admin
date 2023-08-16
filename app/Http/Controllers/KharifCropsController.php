<?php

namespace App\Http\Controllers;

use App\Models\KharifCrops;
use Illuminate\Http\Request;

class KharifCropsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kharifs=KharifCrops::query()->get();
        return inertia('Admin/KharifCropsPage',[
            'kharifs'=>$kharifs
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
            'kharif_crops_name'=>'required',
        ]);
        $kharifs=array_merge($validate,['kharif_crops_code'=>$request->kharif_crops_code]);
        KharifCrops::query()->create($kharifs);
        return to_route('kharif-crops.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KharifCrops $kharifCrops)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KharifCrops $kharifCrops)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate=$this->validate($request,[
            'kharif_crops_name'=>'required'
        ]);
        $data=array_merge($validate,['kharif_crops_code'=>$request->kharif_crops_code]);
        KharifCrops::query()->where('id',$id)->update($data);
        return to_route('kharif-crops.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=KharifCrops::query()->where('id',$id);
        $data->delete();
        return to_route('kharif-crops.index');
    }
}
