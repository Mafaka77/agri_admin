<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Caste;
use App\Models\District;
use App\Models\FarmEquipment;
use App\Models\FarmerCategory;
use App\Models\Fish;
use App\Models\Gender;
use App\Models\GreenHousePlant;
use App\Models\IrrigationInfrastructures;
use App\Models\KharifCrops;
use App\Models\LandCrop;
use App\Models\LandHolding;
use App\Models\Livestock;
use App\Models\Orchards;
use App\Models\OwnershipType;
use App\Models\Plantation;
use App\Models\PoultryTypeOfFarm;
use App\Models\RabiCrops;
use App\Models\Schemes;
use App\Models\Silkworm;
use App\Models\SubDivision;
use App\Models\TypeOfBreed;
use App\Models\TypeOfFarm;
use App\Models\TypeOfPoultryBreed;
use App\Models\TypeOfPoultryFarm;
use App\Models\Village;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function getAllLandholding(Request $request)
    {
        $landHolding=LandHolding::query()->get();
        return response()->json($landHolding,200);
    }
    public function getAllGender()
    {
        $gender=Gender::query()->get();
        return response()->json($gender,200);
    }

    public function getAllCaste()
    {
        $caste=Caste::query()->get();
        return response()->json($caste,200);
    }

    public function farmerCategory()
    {
        $category=FarmerCategory::query()->get();
        return response()->json($category,200);
    }
    public  function getAllDistrict(){
        $district=District::query()->get();
        return response()->json($district,200);
    }

    public function getAllSubDivision()
    {
        $subDivision=SubDivision::query()->get();
        return response()->json($subDivision,200);
    }

    public function getRdBlock()
    {
        $rdBlock= Block::query()->get();
        return response()->json($rdBlock,200);
    }

    public function getVillage()
    {
        $village=Village::query()->get();
        return response()->json($village,200);
    }

    public function getAllOwnership()
    {
        $ownership=OwnershipType::query()->get();
        return response()->json($ownership,200);
    }

    public function getAllIrrigationInfrastructure()
    {
        $infras=IrrigationInfrastructures::query()->get();
        return response()->json($infras,200);
    }

    public function getAllEquipment()
    {
        $equip=FarmEquipment::query()->get();
        return response()->json($equip,200);
    }

    public function kharifCrops()
    {
        $kharif=KharifCrops::query()->get();
        return response()->json($kharif,200);
    }

    public function rabiCrops()
    {
        $rabi=RabiCrops::query()->get();
        return response()->json($rabi,200);
    }

    public function scheme()
    {
        $scheme=Schemes::query()->get();
        return response()->json($scheme,200);
    }
    public function getHorticultureData(Request $request)
    {
        $orchards=Orchards::query()->get();
        $plantation=Plantation::query()->get();
        $greenHouse=GreenHousePlant::query()->get();
        return response()->json(['orchards'=>$orchards,'plantation'=>$plantation,'greenHouse'=>$greenHouse],200);
    }

    public function getLandCrops(Request $request)
    {
        $landCrops=LandCrop::query()->get();
        return response()->json(['crops'=>$landCrops],200);
    }

    public function getAllResources(Request $request)
    {
        $subDivision=SubDivision::query()->get();
        $rdBlock=Block::query()->get();
        $villages=Village::query()->get();
        $landHolding=LandHolding::query()->get();
        $ownershipType=OwnershipType::query()->get();
        $infrastructure=IrrigationInfrastructures::query()->get();
        $equipments=FarmEquipment::query()->get();
        $kharifCrops=KharifCrops::query()->get();
        $rabiCrops=RabiCrops::query()->get();
        $schemes=Schemes::query()->get();
        $orchards=Orchards::query()->get();
        $plantation=Plantation::query()->get();
        $greenHouse=GreenHousePlant::query()->get();
        $landCrops=LandCrop::query()->get();
        $fish=Fish::query()->get();
        $livestock=Livestock::query()->get();
        $typeOfBreed=TypeOfBreed::query()->get();
        $typeOfFarm=TypeOfFarm::query()->get();
        $typeOfPoultryFarm=TypeOfPoultryFarm::query()->get();
        $typeOfPoultryBreed=TypeOfPoultryBreed::query()->get();
        $silkworm=Silkworm::query()->get();
        return response()->json([
            'subDivision'=>$subDivision,
            'rdBlock'=>$rdBlock,
            'villages'=>$villages,
            'landHolding'=>$landHolding,
            'ownershipType'=>$ownershipType,
            'infrastructure'=>$infrastructure,
            'equipments'=>$equipments,
            'kharifCrops'=>$kharifCrops,
            'rabiCrops'=>$rabiCrops,
            'schemes'=>$schemes,
            'orchards'=>$orchards,
            'plantation'=>$plantation,
            'greenHouse'=>$greenHouse,
            'landCrops'=>$landCrops,
            'fish'=>$fish,
            'livestock'=>$livestock,
            'typeOfBreed'=>$typeOfBreed,
            'typeOfFarm'=>$typeOfFarm,
            'typeOfPoultryFarm'=>$typeOfPoultryFarm,
            'typeOfPoultryBreed'=>$typeOfPoultryBreed,
            'silkworm'=>$silkworm
        ],200);
    }
}
