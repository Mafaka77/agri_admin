<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use Illuminate\Http\Request;

class LivestockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livestock=Livestock::query()->get();
        return inertia('Admin/LivestockPage',[
            'livestock'=>$livestock
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
            'livestock_name'=>'required'
        ]);
        Livestock::query()->create($validate);
    }

    /**
     * Display the specified resource.
     */
    public function show(Livestock $livestock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livestock $livestock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate=$this->validate($request,[
            'livestock_name'=>'required'
        ]);Livestock::query()->where('id',$id)->update($validate);

        return to_route('livestock.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Livestock::query()->where('id',$id);
        $data->delete();
        return to_route('livestock.index');
    }
}
