<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\SubDivision;
use Illuminate\Http\Request;

class SubDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $district=District::query()->get();
        $sub_division=SubDivision::query()->with('district')->get();
        return inertia('Admin/SubDivisionPage',[
            'district'=>$district,
            'sub_division'=>$sub_division
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
        $name=SubDivision::query()->where('sub_division_name','=',$request->sub_division_name)->first();

        $validate=$this->validate($request,[
            'sub_division_name'=>'required',
            'district_id'=>'required'
        ]);
        if($name==null){
            SubDivision::query()->create($validate);
            return to_route('sub-division.index');
        }else{
            return redirect()->back()->withErrors([
                'message'=>'Sub Division already exists'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubDivision $subDivision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubDivision $subDivision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validate=$this->validate($request,[
            'sub_division_name'=>'required',
            'district_id'=>'required'
        ]);
        SubDivision::query()->where('id',$id)->update($validate);
        return to_route('sub-division.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=SubDivision::query()->where('id',$id);
        $data->delete();
        return to_route('sub-division.index');
    }
}
