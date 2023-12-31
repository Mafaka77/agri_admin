<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdditionalFarmerDetails;
use App\Models\Block;
use App\Models\Caste;
use App\Models\District;
use App\Models\FarmerAgricultureLandDetails;
use App\Models\FarmerCategory;
use App\Models\Farmers;
use App\Models\FarmersBankDetails;
use App\Models\Gender;
use App\Models\SubDivision;
use App\Models\Village;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BasicInfoController extends Controller
{

    public function checkStatus(Request $request)
    {
        $farmerId=$request->id;

        $basicInfo=Farmers::query()->where('id','=',$farmerId)->first();
        $farmLand=FarmerAgricultureLandDetails::query()->where('farmers_id','=',$farmerId)->first();
        $additional=AdditionalFarmerDetails::query()->where('farmers_id','=',$farmerId)->first();
        info($additional);
        if($farmLand !=null && $additional!=null){
            $basicInfo->update(['status'=>'Complete']);
            return response()->json(['data'=>$basicInfo->status]);
        }else{
            $basicInfo->update(['status'=>'Incomplete']);
            return response()->json(['data'=>$basicInfo->status]);
        }
    }

    public function checkVerification(Request $request)
    {
        $farmerId=$request->id;
        $basicInfo=Farmers::query()->where('id','=',$farmerId)->first();
        return response()->json(['data'=>$basicInfo->verification],200);

    }
    public function sendForApproval(Request $request){
            $farmerId=$request->id;
            $basicInfo=Farmers::query()->where('id',$farmerId)->first();
            $basicInfo->update(['verification'=>'Submitted','rejection_note'=>null]);
            return response()->json(['data'=>$basicInfo->verification],200);

    }
    public function getAllFarmers(Request $request)
    {
        $userId=$request->id;
        $offset=$request->offset??0;
        $limit=$request->limit??15;
        $search=$request->search;
        $sortBy=$request->sortBy=='Oldest'?'asc':'desc';
        $filterBy=$request->filterBy;
        info($filterBy);
        $farmers=Farmers::query()->where('user_id','=',$userId)
            ->with('caste')
            ->with('district')
            ->with('gender')
            ->with('farmerCategory')
            ->with('subDivision')
            ->with('block')
            ->with('village')
            ->with('farmerBankDetails')
            ->orderBy('created_at',$sortBy)
            ->when($filterBy,fn(Builder $builder)=>$builder->where('verification','=',$filterBy))
            ->when($search,fn(Builder $builder)=>$builder->where('full_name','LIKE',"%$search%"))
            ->offset($offset)
            ->limit($limit)
            ->get();
        return response()->json(['data'=>$farmers],200);
    }

    public function submitFarmerBasicInfo(Request $request)
    {

            $farmer=$request->farmer;
            $bank=$request->bank;
            $aadhaar=Farmers::query()->where('aadhaar_no',$farmer['aadhaar_no'])->first();
            $isFarmingMainIncome=$farmer['is_farming_main_income']=='Yes'?1:0;
            $farmerMerge=array_merge($farmer,['is_farming_main_income'=>$isFarmingMainIncome]);
            if($aadhaar==null){
                $farmers= DB::transaction(function () use ($farmerMerge,$bank){
                    $data=Farmers::query()->create($farmerMerge);
                    $data->farmerBankDetails()->create([
                        'bank_name'=>$bank['bank_name'],
                        'account_number'=>$bank['account_number'],
                        'branch_name'=>$bank['branch_name'],
                        'ifsc_code'=>$bank['ifsc_code']
                    ]);
                    return $data;
                });
                return response()->json(['data'=>$farmers],200);
            }else{
                return response()->json(['error'=>'Farmer Already Exists'],409);
            }
//        }catch (\Exception $ex){
////            info($ex);
//        }


    }

    public function getFarmerBasicInfo(Request $request)
    {
        $id=$request->id;
        $farmer=Farmers::query()->where('id','=',$id)
            ->with('caste')
            ->with('district')
            ->with('gender')
            ->with('farmerCategory')
            ->with('subDivision')
            ->with('block')
            ->with('village')
            ->with('farmerBankDetails')
            ->first();
        return response()->json(['farmer'=>$farmer],200);
    }

    public function editFarmerBasicInfo(Request $request)
    {
        info($request->all());
        $validateBank=$this->validate($request,[
            'bank_name'=>'required',
            'account_number'=>'required',
            'branch_name'=>'required',
            'ifsc_code'=>'required',
        ]);
        $farmerData=$this->validate($request,[
            'full_name'=>'required',
            'dob'=>'required',
            'relationship'=>'required',
            'relationship_name'=>'required',
            'phone_no'=>'required',
            'aadhaar_no'=>'required',
            'aadhaar_verify_type'=>'required',
            'voter_no'=>'required',
            'education_qualification'=>'required',
            'is_farming_main_income'=>'required',
            'state_lgd_code'=>'required',
            'village_lgd_code'=>'required',
            'farmer_category_id'=>'required',
            'gender_id'=>'required',
            'caste_id'=>'required',
            'district_id'=>'required',
            'sub_division_id'=>'required',
            'block_id'=>'required',
            'village_id'=>'required',
            'status'=>'required',
            'user_id'=>'required'
        ]);
        $farmers=array_merge($farmerData,['is_farming_main_income'=>$request->is_farming_main_income=='Yes'?1:0]);
        $farmer=Farmers::findOrFail($request->farmerId);
            $farmers= DB::transaction(function () use ($farmer,$farmers,$validateBank){
                $data=$farmer->update($farmers);
                info($data);
                $bank=FarmersBankDetails::findOrFail($data);
                $bank->update($validateBank);
                return $data;
            });
            return response()->json(['data'=>$farmers],200);
    }

    public function deleteFarmer(Request $request)
    {
        try{
            $id=$request->id;
            $farmer=Farmers::query()->where('id',$id)->first();
            $farmer->farmerAgriLandDetails()->delete();
            $farmer->farmerBankDetails()->delete();
            $farmer->delete();
            return response()->json(['message'=>'Successfully Deleted'],200);
        }catch (\Exception $ex){
            return response()->json(500);
        }
    }
}
