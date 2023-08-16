<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdditionalFarmerDetails;
use App\Models\SchemeApplied;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdditionalDetailController extends Controller
{
    public function uploadDocuments(Request $request)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads', $imageName, 'public');
            return response()->json(['data' => $imagePath], 200);
        } else {
            return response()->json(['message' => 'Image upload failed'], 400);
        }
    }

    public function saveAddtionalDetails(Request $request)
    {
//        $data=$request->data;
//        info($data);
        try{
            $data=$request->data;
            $schemeApplied=$request->scheme;
            DB::transaction(function () use($data,$schemeApplied){
                $additional=AdditionalFarmerDetails::query()->create($data);
                $id=$additional->id;
                if($schemeApplied!=null){
                    foreach ($schemeApplied as $scheme){
                        $data=new SchemeApplied();
                        $data->schemes_id=$scheme['scheme_id'];
                        $data->additional_farmer_details_id=$id;
                        $data->availed=$scheme['availed']=='Yes'?1:0;
                        $data->amount=$scheme['amount'];
                        $data->save();
                    }
                }
            });
            return response()->json(200);
//            return response()->json(200);
        }catch (\Exception $ex){
            return response()->json(['message'=>$ex],500);
        }

    }

    public function getAdditionalDetails(Request $request)
    {
        try{
            $additional=AdditionalFarmerDetails::query()->where('id',$request->id)->with('schemeApplied')->with('schemes')->first();
            return response()->json(['data'=>$additional],200);
        }catch (\Exception $exception){}
    }
    public  function  getFarmerScheme(Request $request){
        $farmerScheme=SchemeApplied::query()->where('additional_farmer_details_id',$request->id)->with('schemes')->get();
        return response()->json(['data'=>$farmerScheme],200);
    }

    public function updateAdditionalDetail(Request $request)
    {
        try{
            $data=$request->data;
            $additional=AdditionalFarmerDetails::query()->where('id','=',$data['id'])->first();
            $schemeApplied=$request->scheme;
            DB::transaction(function () use($additional,$schemeApplied,$data){
                $additional->update($data);
                $id=$additional->id;
                SchemeApplied::query()->where('additional_farmer_details_id',$id)->delete();
                if($schemeApplied!=null){
                    foreach ($schemeApplied as $scheme){
                        $data=new SchemeApplied();
                        $data->schemes_id=$scheme['scheme_id'];
                        $data->additional_farmer_details_id=$id;
                        $data->availed=$scheme['availed']=='Yes'?1:0;
                        $data->amount=$scheme['amount'];
                        $data->save();
                    }
                }

            });
            return response()->json(200);
//            return response()->json(200);
        }catch (\Exception $ex){
            return response()->json(['message'=>$ex],500);
        }
    }

    public function deleteAdditionalDetail(Request $request)
    {
        try{
            $id=$request->id;
            $additional=AdditionalFarmerDetails::query()->where('id',$id)->first();
            $additional->delete();
            return response()->json(['message'=>'Successfully Deleted'],200);
        }catch(\Exception $ex){
            return response()->json(500);
        }
    }
}
