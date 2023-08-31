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
//        try{
            $validate=$this->validate($request,[
                'farmers_id'=>'required',
                'location'=>'required',
                'acres_or_hectares'=>'required',
                'total_area'=>'required',
                'plantation_acres_or_hectares'=>'required',
            ]);
            $datas=array_merge($validate,['sericulture_id'=>$request->sericulture_id,'plantation_total_area'=>$request->plantation_total_area,'size_of_rearing_unit'=>$request->size_of_rearing_unit]);
            $silkwormId=$request->silkworm_ids;
            DB::transaction(function () use($datas,$silkwormId){
                $data=FarmerSericultureDetails::query()->create($datas);
                $data->silkworm()->sync($silkwormId);
            });
            return to_route('farmer-details',[
                'farmer'=>$request->farmers_id
            ]);
//        }catch (\Exception $ex){
//            return redirect()->back()->withErrors(['message'=>$ex]);
//        }

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
    public function edit(FarmerSericultureDetails $farmerSericultureDetails,int $id)
    {
        $silkWorm=Silkworm::query()->get();
        $sericulture=FarmerSericultureDetails::query()
            ->where('id',$id)
            ->with('silkworm')
            ->first();
        return inertia('Edit/EditFarmerSericulturePage',[
            'farmers_id'=>$id,
            'silkWorm'=>$silkWorm,
            'sericulture'=>$sericulture
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmerSericultureDetails $farmerSericultureDetails,int $id)
    {
        try{
            $validate=$this->validate($request,[
                'farmers_id'=>'required',
                'location'=>'required',
                'acres_or_hectares'=>'required',
                'total_area'=>'required',
                'plantation_acres_or_hectares'=>'required',
            ]);
            $datas=array_merge($validate,['sericulture_id'=>$request->sericulture_id,'plantation_total_area'=>$request->plantation_total_area,'size_of_rearing_unit'=>$request->size_of_rearing_unit]);
            $silkwormId=$request->silkworm_ids;
            DB::transaction(function () use($datas,$silkwormId,$id){
                $data=FarmerSericultureDetails::query()->where('id',$id)->first();
                $data->update($datas);
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
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerSericultureDetails $farmerSericultureDetails,int $id)
    {
        $data=FarmerSericultureDetails::query()->where('id',$id)->first();
        $farmer_id=$data->farmers_id;
        $data->delete();
        $data->silkwormReared()->delete();
        return to_route('farmer-details',[
            'farmer'=>$farmer_id,
        ]);
    }
}
