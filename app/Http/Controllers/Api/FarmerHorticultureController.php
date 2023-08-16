<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FarmerHorticultureFarmDetails;
use App\Models\GreenHousePlant;
use App\Models\Orchards;
use App\Models\Plantation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmerHorticultureController extends Controller
{
    public function submitHorticultureDetails(Request $request)
    {
        $data=$request->data;
        $kharifCrops=$request->kharifCrops;
        $rabiCrops=$request->rabiCrops;
        $orchards=$request->orchards;
        $plantation=$request->plantation;
        $greenHouse=$request->greenHouse;
        DB::transaction(function () use($data,$kharifCrops,$rabiCrops,$orchards,$plantation,$greenHouse){
               $horti=FarmerHorticultureFarmDetails::query()->create($data);
               $horti->farmerHortiKharifCrops()->sync($kharifCrops);
               $horti->farmerHortiRabiCrops()->sync($rabiCrops);
               $horti->farmerOrchids()->sync($orchards);
               $horti->farmerPlantation()->sync($plantation);
               $horti->greenHousePlants()->sync($greenHouse);
        });
        return response()->json(200);
    }

    public function getHorticultureDetail(Request $request,int $id)
    {
        $hortiDetail=FarmerHorticultureFarmDetails::query()->where('id','=',$id)
            ->with('farmerOrchids')
            ->with('farmerPlantation')
            ->with('farmerHortiKharifCrops')
            ->with('farmerHortiRabiCrops')
            ->with('greenHousePlants')
            ->first();
        info($hortiDetail);
        return response()->json(['data'=>$hortiDetail],200);
    }

    public function updateHorticultureDetail(Request $request,int $id)
    {
        $data=$request->data;
        info($data);
        $kharifCrops=$request->kharifCrops;
        $rabiCrops=$request->rabiCrops;
        $orchards=$request->orchards;
        $plantation=$request->plantation;
        $greenHouse=$request->greenHouse;
        DB::transaction(function () use($id,$data,$kharifCrops,$rabiCrops,$orchards,$plantation,$greenHouse){
            $horti=FarmerHorticultureFarmDetails::query()->where('id',$id)->first();
            $horti->update($data);
            $horti->farmerHortiKharifCrops()->sync($kharifCrops);
            $horti->farmerHortiRabiCrops()->sync($rabiCrops);
            $horti->farmerOrchids()->sync($orchards);
            $horti->farmerPlantation()->sync($plantation);
            $horti->greenHousePlants()->sync($greenHouse);
        });
        return response()->json(200);
    }

    public function deleteHorticulture(Request $request,int $id)
    {
        try{
            $horti=FarmerHorticultureFarmDetails::query()->where('id',$id)->first();
            $horti->delete();
            $horti->farmerHortiKharifCrops()->delete();
            $horti->farmerHortiRabiCrops()->delete();
            $horti->farmerOrchids()->delete();
            $horti->farmerPlantation()->delete();
            $horti->greenHousePlants()->delete();
            return response()->json(200);
        }catch (\Exception $ex){
            return response()->json(500);
        }
    }
}
