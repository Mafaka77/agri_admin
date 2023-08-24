<?php
namespace App\Http\Controllers;
use App\Models\District;
use App\Models\Farmers;
use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user=Auth::user();


        switch ($user->roles_id){

            case 3:
                $unSubmitted=Farmers::query()
                    ->where('user_id','=','3')
                    ->where('verification','=','Pending')
                    ->count();
                $pendingApproval=Farmers::query()
                    ->where('user_id','=','3')
                    ->where('verification','=','Submitted')
                    ->count();
                $approved= Farmers::query()
                    ->where('user_id','=','3')
                    ->where('verification','=','Approved')
                    ->count();
                return inertia('HomePage',[
                'unSubmitted'=>$unSubmitted,
                'pendingApproval'=>$pendingApproval,
                'totalApproved'=>$approved
            ]);
            break;
            case 2:
                $pendingCounts=Farmers::query()->where('district_id',$user->district_id)->where('verification','=','Submitted')->count();
                $totalFarmersDistrictWise=Farmers::query()->where('district_id',$user->district_id)->where('verification','=','Approved')->count();
                $district=District::query()->where('id',$user->district_id)->first();
                $totalApprovedFarmers=Farmers::query()->where('verification','=','Approved')->count();
                $pendingList=Farmers::query()->where('district_id',$user->district_id)->where('verification','=','Submitted')->with('user')->get();
                $enumeratorList=User::query()->where('roles_id','=','3')
                    ->where('district_id',$user->district_id)
                    ->get();
                return inertia('Supervisor/SupervisorHomePage',[
                'pendingCounts'=>$pendingCounts,
                'totalFarmersDistrictWise'=>$totalFarmersDistrictWise,
                'totalFarmers'=>$totalApprovedFarmers,
                    'district'=>$district,
                    'pendingList'=>$pendingList,
                    'enumeratorList'=>$enumeratorList,
            ]);
            break;
            default:
                $totalFarmers=Farmers::query()->where('verification','=','Approved')->count();
                $totalSupervisors=User::query()->where('roles_id','=','2')->count();
                $totalEnumerators=User::query()->where('roles_id','=','3')->count();
                return inertia('Admin/AdminHomePage',[
                    'totalFarmerRegistered'=>$totalFarmers,
                    'totalSupervisors'=>$totalSupervisors,
                    'totalEnumerators'=>$totalEnumerators,
            ]);
        }
//        if($user->roles_id==3){
//            return inertia('HomePage',[
//                'farmerCounts'=>$farmerCounts,
//                'villageCounts'=>$villageCounts,
//                'districtCounts'=>$districtCounts
//            ]);
//        }else if($user->roles_id==2){
//            return inertia('Supervisor/SupervisorHomePage',[
//                'farmerCounts'=>$farmerCounts,
//                'villageCounts'=>$villageCounts,
//                'districtCounts'=>$districtCounts
//            ]);
//        }else{
//            return inertia('Supervisor/SupervisorHomePage',[
//                'farmerCounts'=>$farmerCounts,
//                'villageCounts'=>$villageCounts,
//                'districtCounts'=>$districtCounts
//            ]);
//        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('dashboard');
    }
}
