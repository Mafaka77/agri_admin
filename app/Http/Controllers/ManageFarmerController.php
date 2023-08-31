<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\District;
use App\Models\Farmers;
use App\Models\Roles;
use App\Models\Village;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageFarmerController extends Controller
{
    public function index(Request $request)
    {
        $rolesId=Auth::user()->roles_id;
        $user=Auth::user();
        switch ($rolesId){
            case 3:{
                $search=$request->get('search');
                $filterBy=$request->get('filterBy');
                $perPage = $request->get('per_page') ?? 10;
                $farmers=Farmers::query()
                    ->orderBy('created_at', 'DESC')
                    ->with('district')
                    ->where('user_id',$user->id)
                    ->when($filterBy,fn(Builder $builder)=>$builder->where('verification','=',$filterBy))
                    ->when($search, fn (Builder $builder) => $builder->where('full_name', 'LIKE', "%$search%"))
                    ->latest()
                    ->paginate($perPage);
                return inertia('ManageFarmer',[
                    'farmers'=>$farmers
                ]);
            }
            case 2:{
                $search = $request->get('search');
                $perPage = $request->get('per_page') ?? 10;
                $district=District::query()->where('id',$user->district_id)->first();
                $filterBy=$request->get('filterBy');
                $farmers=Farmers::query()
                    ->orderBy('created_at', 'DESC')
                    ->with('district')
                    ->where('district_id',$user->district_id)
                    ->where('verification','!=','Pending')
                    ->with('user')
                    ->when($filterBy,fn(Builder $builder)=>$builder->where('verification','=',$filterBy))
                    ->when($search, fn (Builder $builder) => $builder->where('full_name', 'LIKE', "%$search%"))
                    ->latest()
                    ->paginate($perPage);
                return inertia('Supervisor/SupervisorManageFarmerPage',[
                    'farmers'=>$farmers,
                    'district'=>$district,
                ]);
            }
            default:{
                $search = $request->get('search');
                $perPage = $request->get('per_page') ?? 10;
                $farmers=Farmers::query()
                    ->orderBy('created_at', 'DESC')
                    ->with('district')
                    ->where('verification','=','Approved')
                    ->with('user')
                    ->when($search, fn (Builder $builder) => $builder->where('full_name', 'LIKE', "%$search%"))
                    ->latest()
                    ->paginate($perPage);
                return inertia('Admin/AdminManageFarmerPage',[
                    'farmers'=>$farmers
                ]);
            }
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
