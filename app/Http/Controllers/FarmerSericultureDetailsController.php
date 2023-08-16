<?php

namespace App\Http\Controllers;

use App\Models\FarmerSericultureDetails;
use App\Models\Silkworm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmerSericultureDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,int $id)
    {
        $silkWorm=Silkworm::query()->get();
        return inertia('AddFarmerSericulture',[
            'farmers_id'=>$id,
            'silkWorm'=>$silkWorm
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
                'sericulture_id'=>'required',
                'location'=>'required',
                'acres_or_hectares'=>'required',
                'total_area'=>'required',
                'size_of_rearing_unit'=>'required',
                'plantation_acres_or_hectares'=>'required',
                'plantation_total_area'=>'required',
            ]);
            $silkwormId=$request->silkworm_ids;
            DB::transaction(function () use($validate,$silkwormId){
                $data=FarmerSericultureDetails::query()->create($validate);
                $data->silkworm()->sync($silkwormId);
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
    public function show(FarmerSericultureDetails $farmerSericultureDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmerSericultureDetails $farmerSericultureDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmerSericultureDetails $farmerSericultureDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerSericultureDetails $farmerSericultureDetails)
    {
        //
    }
}
