<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\District;
use App\Models\Farmers;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageFarmerController extends Controller
{
    public function index()
    {
        $rolesId=Auth::user()->roles_id;
        $user=Auth::user();
        if($rolesId==3){
             $farmers=Farmers::query()->with('district')->where('user_id',$user->id)->get();
            return inertia('ManageFarmer',[
                'farmers'=>$farmers
            ]);
        }else if($rolesId==2){
            $farmers=Farmers::query()->with('district')->where('district_id',$user->district_id)->where('verification','!=','Pending')->get();
            return inertia('ManageFarmer',[
                'farmers'=>$farmers
            ]);
        }else{
            $farmers=Farmers::query()->with('district')->get();
            return inertia('ManageFarmer',[
                'farmers'=>$farmers
            ]);
        }


    }

    public function getSubDivision(District $district)
    {
        $subDivision=$district->subDivision()->get();
        return response()->json(['data'=>$subDivision]);
    }

    public function getBlock(District $district)
    {
        $block=$district->block()->get();
        return response()->json(['data'=>$block]);
    }
    public function getVillages(Block $block){
        $village=$block->villages()->get();
        return response()->json(['data'=>$village]);
    }

    public function getVillageLgd(string $id)
    {

        $data=Village::query()->where('id','=',$id)->get('village_lgd_code')->first();
        return response()->json(['data'=>$data]);
    }

    public function openClicked(string $id)
    {
        return to_route('farmer-details',[
            'farmer'=>$id
        ]);
    }
}
