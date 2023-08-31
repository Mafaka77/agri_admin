<?php
namespace App\Http\Controllers;
use App\Models\District;
use App\Models\Farmers;
use App\Models\Roles;
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
                    ->where('user_id','=',$user->id)
                    ->where('verification','=','Pending')
                    ->count();
                $pendingApproval=Farmers::query()
                    ->where('user_id','=',$user->id)
                    ->where('verification','=','Submitted')
                    ->count();
                $approved= Farmers::query()
                    ->where('user_id','=',$user->id)
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
                $district=District::query()->where('id',$user->district_id)->get();
                $totalApprovedFarmers=Farmers::query()->where('verification','=','Approved')->count();
                $pendingList=Farmers::query()->where('district_id',$user->district_id)->where('verification','=','Submitted')->with('user')->get();
                $roles=Roles::query()->where('id','=','3')->get();
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
                    'roleList'=>$roles
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

    public function createEnumerator(Request $request)
    {
        $validate=$request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'district_id'=>'required',
            'roles_id'=>'required',
        ]);
        $data=array_merge($validate,['password'=>bcrypt($request->password),'mobile'=>$request->mobile]);
        $email=User::query()->where('email','=',$request->email)->first();

        if($email!=null){
            return back()->withErrors(['message'=>'User already exists']);
        }else{
            User::query()->create($data);
            return to_route('dashboard');
        }


    }
}
