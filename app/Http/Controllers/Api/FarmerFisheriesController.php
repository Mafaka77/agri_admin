<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FarmerFisherie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmerFisheriesController extends Controller
{
    public function submitFisheries(Request $request)
    {
        $data=$request->data;
        $fishCultured=$request->fish;
        DB::transaction(function () use ($data,$fishCultured){
            $fisherie=FarmerFisherie::query()->create($data);
            $fisherie->fish()->sync($fishCultured);
        });
        return response()->json(200);
    }

    public function getFisheries(Request $request,int $id)
    {
        $fisherie=FarmerFisherie::query()->where('id',$id)
            ->with('fish')
            ->first();
        info($fisherie);
        return response()->json(['data'=>$fisherie],200);
    }

    public function updateFisheries(Request $request,int $id)
    {
        $data=$request->data;
        $fishCultured=$request->fish;
        DB::transaction(function () use ($data,$fishCultured,$id){
            $fisherie=FarmerFisherie::query()->findOrFail($id)->first();
            $fisherie->update($data);
            $fisherie->fish()->sync($fishCultured);
        });
        return response()->json(200);
    }

    public function deleteFisheries(Request $request,int $id)
    {
        $fisheries=FarmerFisherie::query()->findOrFail($id)->first();
        $fisheries->delete();
        $fisheries->farmerFishCultured()->delete();
        return response()->json(200);
    }
}
