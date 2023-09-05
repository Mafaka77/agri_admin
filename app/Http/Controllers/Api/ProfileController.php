<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AppControls;
use App\Models\Farmers;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile(Request $request,int $id)
    {
        $user=User::query()->where('id',$id)->first();
        $unsubmitted=Farmers::query()->where('user_id',$id)->where('verification','=','Pending')->count();
        $submitted=Farmers::query()->where('user_id',$id)->where('verification','=','Submitted')->count();
        $approved=Farmers::query()->where('user_id',$id)->where('verification','=','Approved')->count();
        $downloadBtn=AppControls::query()->first();
        return response()->json(['user'=>$user,'unsubmitted'=>$unsubmitted,'submitted'=>$submitted,'approved'=>$approved,'downloadBtn'=>$downloadBtn],200);
    }

}
