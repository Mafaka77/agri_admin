<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FarmerSericultureDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SericultureController extends Controller
{
    public function submitSericulture(Request $request)
    {
        try{
            $data=$request->data;
            $silkwormReared=$request->reared;
            DB::transaction(function () use($data,$silkwormReared){
                $silk=FarmerSericultureDetails::query()->create($data);
                $silk->silkworm()->sync($silkwormReared);
            });
            return response()->json(['data'=>'Successfully added'],200);
        }catch (\Exception $ex){
            return  response()->json(['message'=>'Error Occured'],500);
        }

    }

    public function getSericulture(Request $request,int $id)
    {
        $sericulture=FarmerSericultureDetails::query()->where('id',$id)
            ->with('silkworm')
            ->first();
        info($sericulture);
        return response()->json(['data'=>$sericulture],200);
    }

    public function updateSericulture(Request $request,int $id)
    {
        info($request->all());
        try{
            $data=$request->data;
            $silkwormReared=$request->reared;
            DB::transaction(function () use($data,$silkwormReared,$id){
                $silk=FarmerSericultureDetails::query()->findOrFail($id)->first();
                $silk->update($data);
                $silk->silkworm()->sync($silkwormReared);
            });
            return response()->json(['data'=>'Successfully updated'],200);
        }catch (\Exception $ex){
            return  response()->json(['message'=>'Error Occured'],500);
        }
    }

    public function deleteSericulture(Request $request,int $id)
    {
        try{
            $seri=FarmerSericultureDetails::query()->findOrFail($id)->first();
            $seri->delete();
            $seri->silkworm()->delete();
            return response()->json(['data'=>'Deleted'],200);
        }catch (\Exception $ex){
            return response()->json(['message'=>'Error Occured'],500);
        }

    }
}
