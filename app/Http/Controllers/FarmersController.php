<?php

namespace App\Http\Controllers;

use App\Models\Caste;
use App\Models\District;
use App\Models\FarmerCategory;
use App\Models\Farmers;
use App\Models\FarmersBankDetails;
use App\Models\Gender;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class FarmersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user();
        $gender=Gender::query()->get();
        $district=District::query()->where('id',$user->district_id)->get();
        $caste=Caste::query()->get();
        $category=FarmerCategory::query()->get();
        return inertia('AddFarmerBasicInfo',[
            'gender'=>$gender,
            'districts'=>$district,
            'caste'=>$caste,
            'category'=>$category,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId=Auth::user()->id;
        $validateBank=$this->validate($request,[
            'bank_name'=>'required',
            'account_number'=>'required',
            'branch_name'=>'required',
            'ifsc_code'=>'required',
        ]);
       $applications=$this->validate($request,[
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
       ]);
       $aadhaar=Farmers::query()->where('aadhaar_no',$request->aadhaar_no)->first();
       if($aadhaar==null){
           $is_farming_main_income=$request->is_farming_main_income==='Yes'?1:0;
           $allApplications=array_merge($applications,['status'=>'Incomplete','is_farming_main_income'=>$is_farming_main_income,'user_id'=>$userId]);
           $farmer= DB::transaction(function () use ($allApplications,$validateBank){
               $farmer= Farmers::query()->create($allApplications);
               $farmer->farmerBankDetails()->create($validateBank);
               return $farmer;

           });
           return to_route('farmer-details',[
               'farmer'=>$farmer->id
           ]);
       }else{
            return redirect()->back()->withErrors([
                'message'=>'Farmer already exists'
            ]);
       }

    }

    /**
     * Display the specified resource.
     */
    public function show(Farmers $farmers)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farmers $farmers,int $id)
    {
        $gender=Gender::query()->get();
        $district=District::query()->get();
        $caste=Caste::query()->get();
        $category=FarmerCategory::query()->get();
        $basicInfo=Farmers::query()->where('id',$id)
            ->with('district')
            ->with('village')
            ->with('block')
            ->with('farmerBankDetails')
            ->first();
        return \inertia('Edit/EditFarmerBasicInfoPage',[
            'basicInfo'=>$basicInfo,
            'gender'=>$gender,
            'districts'=>$district,
            'caste'=>$caste,
            'category'=>$category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        try{
            $validateBank=$this->validate($request,[
            'bank_name'=>'required',
            'account_number'=>'required',
            'branch_name'=>'required',
        ]);
            $applications=$this->validate($request,[
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
                'block_id'=>'required',
                'village_id'=>'required',
            ]);
            $is_farming_main_income=$request->is_farming_main_income==='Yes'?1:0;
            $allApplications=array_merge($applications,['is_farming_main_income'=>$is_farming_main_income]);
            DB::transaction(function () use ($allApplications,$id,$validateBank){
               $farmer= Farmers::query()->where('id','=',$id)->update($allApplications);
                FarmersBankDetails::query()->where('farmers_id','=',$farmer)->update($validateBank);
            });
            return to_route('manage-farmer');
        }catch (\Exception $ex){

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $farmer=Farmers::query()->where('id','=',$id)->first();
        $farmer->delete();
        $farmer->farmerBankDetails()->delete();
        return to_route('manage-farmer');
    }
}
