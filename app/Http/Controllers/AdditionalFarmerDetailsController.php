<?php

namespace App\Http\Controllers;

use App\Models\AdditionalFarmerDetails;
use App\Models\SchemeApplied;
use App\Models\Schemes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdditionalFarmerDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,int $id)
    {

        $scheme=Schemes::query()->get();
        return inertia('AddAdditionalFarmerDetailPage',[
            'farmer_id'=>$id,
            'schemes'=>$scheme
        ]);
    }

    public function uploadRationCard(Request $request)
    {
        if($request->hasFile('ration_card_document')){
            $file=$request->file('ration_card_document');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file_path = $file->storeAs('uploads', $file_name, 'public');
            return response()->json(['data'=>$file_path]);
        }else{
            return response()->json('Error Uploading a file');
        }
    }

    public function uploadAadhaarCard(Request $request)
    {
        if($request->hasFile('aadhaar_card_document')){
            $file=$request->file('aadhaar_card_document');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file_path = $file->storeAs('uploads', $file_name, 'public');
            return response()->json(['data'=>$file_path]);
        }else{
            return response()->json('Error Uploading a file');
        }
    }

    public function uploadPassbook(Request $request)
    {
        if($request->hasFile('bank_passbook_document')){
            $file=$request->file('bank_passbook_document');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file_path = $file->storeAs('uploads', $file_name, 'public');
            return response()->json(['data'=>$file_path]);
        }else{
            return response()->json('Error Uploading a file');
        }
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
        try{
            $validate=$this->validate($request,[
                'farmers_id'=>'required',
                'ration_card_number'=>'required',
                'ration_card_path'=>'required',
                'aadhaar_card_path'=>'required',
                'bank_passbook_path'=>'required',
                'date_of_data_collection'=>'required',

            ]);
            $schemeApplied=$request->schemeApplied;
            $applications=array_merge($validate,['remarks'=>$request->remarks,'is_kcc_availed'=>$request->is_kcc_availed=='Yes'?1:0,'kcc_card_no'=>$request->kcc_card_no,
                'kcc_renew_or_new'=>$request->kcc_renew_or_new,'bank_name'=>$request->bank_name,
                'branch_name'=>$request->branch_name,'year_of_amount_sanction'=>$request->year_of_amount_sanction,
                'amount_sanction'=>$request->amount_sanction,
            ]);
            DB::transaction(function () use ($schemeApplied,$applications){
                $data=AdditionalFarmerDetails::query()->create($applications);
                $id=$data->id;
                if($schemeApplied!=null){
                    foreach ($schemeApplied as $scheme){
                        $data=new SchemeApplied();
                        $data->scheme_name=$scheme['scheme'];
                        $data->schemes_id=$scheme['schemes_id'];
                        $data->additional_farmer_details_id=$id;
                        $data->availed=$scheme['availed']=='Yes'?1:0;
                        $data->amount=$scheme['amount'];
                        $data->save();
                    }

                }
            });
            return to_route('farmer-details',[
                'farmer'=>$request->farmers_id
            ]);
        }catch (\Exception $ex){
            return redirect()->back()->withErrors(['message'=>$ex]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(AdditionalFarmerDetails $additionalFarmerDetails,int $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdditionalFarmerDetails $additionalFarmerDetails,int $id)
    {
        $scheme=Schemes::query()->get();
        $additional=AdditionalFarmerDetails::query()->where('id',$id)
            ->with('schemeApplied')
            ->first();
        return inertia('Edit/EditFarmerAdditionalPage',[
            'schemes'=>$scheme,
            'additional'=>$additional
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdditionalFarmerDetails $additionalFarmerDetails,int $id)
    {
        try{
            $validatedData=$this->validate($request,[
                'ration_card_number'=>'required',
                'ration_card_path'=>'required',
                'aadhaar_card_path'=>'required',
                'bank_passbook_path'=>'required',
                'date_of_data_collection'=>'required',

            ]);
            $schemeApplied=$request->schemeApplied;

            $applications=array_merge($validatedData,['remarks'=>$request->remarks,'is_kcc_availed'=>$request->is_kcc_availed=='Yes'?1:0,'kcc_card_no'=>$request->kcc_card_no,
                'kcc_renew_or_new'=>$request->kcc_renew_or_new,'bank_name'=>$request->bank_name,
                'branch_name'=>$request->branch_name,'year_of_amount_sanction'=>$request->year_of_amount_sanction,
                'amount_sanction'=>$request->amount_sanction,
            ]);
            $additional=AdditionalFarmerDetails::query()->findOrFail($id);
            $farmer_id=$additional->farmers_id;
            DB::transaction(function () use ($schemeApplied,$applications,$additional){
                $additional->update($applications);
                $id=$additional->id;
                SchemeApplied::query()->where('additional_farmer_details_id',$id)->delete();
                if($schemeApplied!=null){
                    foreach ($schemeApplied as $scheme){
                        $data=new SchemeApplied();
                        $data->scheme_name=$scheme['scheme_name'];
                        $data->schemes_id=$scheme['schemes_id'];
                        $data->additional_farmer_details_id=$id;
                        $data->availed=$scheme['availed']=='Yes'?1:0;
                        $data->amount=$scheme['amount'];
                        $data->save();
                    }
                }
            });
            return to_route('farmer-details',[
                'farmer'=>$farmer_id
            ]);
        }catch (\Exception $ex){
            return redirect()->back()->withErrors(['message'=>$ex]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdditionalFarmerDetails $additionalFarmerDetails)
    {
        //
    }
}
