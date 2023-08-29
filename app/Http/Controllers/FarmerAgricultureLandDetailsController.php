<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\FarmEquipment;
use App\Models\FarmerAgricultureLandDetails;
use App\Models\FarmerIrrigationInfrastructure;
use App\Models\Farmers;
use App\Models\IrrigationInfrastructures;
use App\Models\KharifCrops;
use App\Models\LandHolding;
use App\Models\OwnershipType;
use App\Models\RabiCrops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FarmerAgricultureLandDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,int $id)
    {

        $farmer=Farmers::query()->where('id',$id)->first();
        $farmerName=$farmer->full_name;
        $farmerId=$id;
        $district=District::query()->get();
        $ownership_type=OwnershipType::query()->get();
        $irrigation=IrrigationInfrastructures::query()->get();
        $equipment=FarmEquipment::query()->get();
        $kharifCrops=KharifCrops::query()->get();
        $rabiCrops=RabiCrops::query()->get();
        $landHolding=LandHolding::query()->get();
        return inertia('AddFarmerAgricultureLand',[
            'farmerId'=>$farmerId,
            'farmerName'=>$farmerName,
            'district'=>$district,
            'ownership_type'=>$ownership_type,
            'irrigation'=>$irrigation,
            'equipment'=>$equipment,
            'kharifCrops'=>$kharifCrops,
            'rabiCrops'=>$rabiCrops,
            'landHolding'=>$landHolding
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
        try{

            $validateLand=$this->validate($request,[
                'farmers_id'=>'required',
                'land_owner_name'=>'required',
                'area_of_land'=>'required',
                'acres_or_hectares'=>'required',
                'latitude'=>'required',
                'longitude'=>'required',
                'landholding_documents_number'=>'required',
                'land_holding_file'=>'required',
                'kharif_acres_or_hectares'=>'required',
                'rabi_acres_or_hectares'=>'required',
                'district_id'=>'required',
                'block_id'=>'required',
                'village_id'=>'required',
                'land_holding_id'=>'required',
                'ownership_type_id'=>'required'
            ]);
            $altitude=$request->altitude;
            $other_irrigation_infrastructure=$request->other_irrigation_infrastructure;
            $other_farm_equipment=$request->other_farm_equipment;
            $irrigationInfrastructure=$request->irrigation_infrastructure_ids;
            $farmEquipment=$request->farm_equipment_ids;
            $farmerKharifCrops=$request->kharif_crop_ids;
            $farmerRabiCrops=$request->rabi_crop_ids;
            $file=$request->file('land_holding_file');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file_path = $file->storeAs('uploads', $file_name, 'public');
            $applications=array_merge($validateLand,[
                'farmer_agri_id'=>$request->farmer_agri_id,
                'altitude'=>$altitude,
                'other_irrigation_infrastructure'=>$other_irrigation_infrastructure,
                'other_farm_equipment'=>$other_farm_equipment,
                'land_holding_file'=>$file_path,
                'sub_division_id'=>1,
                'farmer_agri_id'=>$request->farmer_agri_id,
                'kharif_total_area'=>$request->kharif_total_area,
                'rabi_total_area'=>$request->rabi_total_area
                ]);
            DB::transaction(function () use ($applications,$irrigationInfrastructure,$farmEquipment,$farmerRabiCrops,$farmerKharifCrops) {
                $data = FarmerAgricultureLandDetails::query()->create($applications,);
                $data->irrigationInfrastructures()->sync($irrigationInfrastructure);
                $data->farmEquipments()->sync($farmEquipment);
                $data->kharifCrops()->sync($farmerKharifCrops);
                $data->rabiCrops()->sync($farmerRabiCrops);
            });
            return to_route('farmer-details',[
                'farmer'=>$request->farmers_id
            ]);
        }catch (\Exception $ex){
                return redirect()->back()->withErrors(['message'=>'Error Occured! Please fill all required forms']);
        }



    }

    /**
     * Display the specified resource.
     */
    public function show(FarmerAgricultureLandDetails $farmerAgricultureLandDetails)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FarmerAgricultureLandDetails $farmerAgricultureLandDetails,int $id)
    {
        $district=District::query()->get();
        $ownership_type=OwnershipType::query()->get();
        $irrigation=IrrigationInfrastructures::query()->get();
        $equipment=FarmEquipment::query()->get();
        $kharifCrops=KharifCrops::query()->get();
        $rabiCrops=RabiCrops::query()->get();
        $landHolding=LandHolding::query()->get();
        $agriLandDetails=FarmerAgricultureLandDetails::query()->where('id',$id)
            ->with('block')
            ->with('subDivision')
            ->with('village')
            ->with('irrigationInfrastructures')
            ->with('farmEquipments')
            ->with('kharifCrops')
            ->with('rabiCrops')
            ->first();
        return inertia('Edit/EditFarmerAgriFarmDetailPage',[
            'landDetails'=>$agriLandDetails,
            'district'=>$district,
            'ownership_type'=>$ownership_type,
            'irrigation'=>$irrigation,
            'equipment'=>$equipment,
            'kharifCrops'=>$kharifCrops,
            'rabiCrops'=>$rabiCrops,
            'landHolding'=>$landHolding,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FarmerAgricultureLandDetails $farmerAgricultureLandDetails,int $id)
    {

//        try{
            $altitude=$request->altitude;
            $other_irrigation_infrastructure=$request->other_irrigation_infrastructure;
            $other_farm_equipment=$request->other_farm_equipment;
            $validateLand=$this->validate($request,[
                'farmers_id'=>'required',
                'land_owner_name'=>'required',
                'area_of_land'=>'required',
                'acres_or_hectares'=>'required',
                'latitude'=>'required',
                'longitude'=>'required',
                'landholding_documents_number'=>'required',
                'land_holding_file'=>'required',
                'kharif_acres_or_hectares'=>'required',
                'kharif_total_area'=>'required',
                'rabi_acres_or_hectares'=>'required',
                'rabi_total_area'=>'required',
                'district_id'=>'required',
                'block_id'=>'required',
                'village_id'=>'required',
                'land_holding_id'=>'required',
                'ownership_type_id'=>'required'
            ]);

            $irrigationInfrastructure=$request->irrigation_infrastructure_ids;
            $farmEquipment=$request->farm_equipment_ids;
            $farmerKharifCrops=$request->kharif_crop_ids;
            $farmerRabiCrops=$request->rabi_crop_ids;
            $data = FarmerAgricultureLandDetails::query()->where('id',$id)->first();
            $applications=array_merge($validateLand,[
                'altitude'=>$altitude,
                'other_irrigation_infrastructure'=>$other_irrigation_infrastructure,
                'other_farm_equipment'=>$other_farm_equipment,
                'sub_division_id'=>$request->sub_division_id,
                'farmer_agri_id'=>$request->farmer_agri_id,
                ]);

            DB::transaction(function () use ($applications,$irrigationInfrastructure,$farmEquipment,$farmerRabiCrops,$farmerKharifCrops,$data) {
                $data->update($applications);
                $data->irrigationInfrastructures()->sync($irrigationInfrastructure);
                $data->farmEquipments()->sync($farmEquipment);
                $data->kharifCrops()->sync($farmerKharifCrops);
                $data->rabiCrops()->sync($farmerRabiCrops);
            });
            return to_route('farmer-details',[
                'farmer'=>$request->farmers_id
            ]);
//        }catch (\Exception $ex){
//            return redirect()->back()->withErrors(['message'=>$ex]);
//        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FarmerAgricultureLandDetails $farmerAgricultureLandDetails,$id)
    {
        $land=FarmerAgricultureLandDetails::query()->where('id',$id)->first();
        $land->delete();
        $land->farmerIrrigationInfrastructure()->delete();
        $land->farmerFarmEquipment()->delete();
        $land->farmerKharifCrops()->delete();
        $land->farmerRabiCrops()->delete();
        return redirect()->back();
    }

    public function uploadLandHoldingFile(Request $request)
    {
        if($request->hasFile('land_holding_file')){
            $file=$request->file('land_holding_file');
            $file_name = time().'_'.$file->getClientOriginalName();
            $file_path = $file->storeAs('uploads', $file_name, 'public');
            return response()->json(['data'=>$file_path]);
        }else{
            return response()->json('Error Uploading a file');
        }
    }
}
