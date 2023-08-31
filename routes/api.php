<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//RESOURCE API
Route::get('get-all-gender',[\App\Http\Controllers\Api\ResourceController::class,'getAllGender'])->name('get-all-gender');
Route::get('get-all-caste',[\App\Http\Controllers\Api\ResourceController::class,'getAllCaste'])->name('get-all-caste');
Route::get('get-all-category',[\App\Http\Controllers\Api\ResourceController::class,'farmerCategory'])->name('get-all-category');
Route::get('get-all-district',[\App\Http\Controllers\Api\ResourceController::class,'getAllDistrict'])->name('get-all-district');
Route::get('get-all-subDivision',[\App\Http\Controllers\Api\ResourceController::class,'getAllSubDivision'])->name('get-all-subDivision');
Route::get('get-rd-block',[\App\Http\Controllers\Api\ResourceController::class,'getRdBlock'])->name('get-rd-block');
Route::get('get-village',[\App\Http\Controllers\Api\ResourceController::class,'getVillage'])->name('get-village');
Route::get('get-all-landholding',[\App\Http\Controllers\Api\ResourceController::class,'getAllLandholding'])->name('get-all-landholding');
Route::get('get-all-ownership-type',[\App\Http\Controllers\Api\ResourceController::class,'getAllOwnership'])->name('get-all-ownership-type');
Route::get('get-all-irrigation-infrastructure',[\App\Http\Controllers\Api\ResourceController::class,'getAllIrrigationInfrastructure'])->name('get-all-irrigation-infrastructure');
Route::get('get-all-farm-equipment',[\App\Http\Controllers\Api\ResourceController::class,'getAllEquipment'])->name('get-all-farm-equipment');
Route::get('get-all-kharif-crops',[\App\Http\Controllers\Api\ResourceController::class,'kharifCrops'])->name('get-all-kharif-crops');
Route::get('get-all-rabi-crops',[\App\Http\Controllers\Api\ResourceController::class,'rabiCrops'])->name('get-all-rabi-crops');
Route::get('get-all-scheme',[\App\Http\Controllers\Api\ResourceController::class,'scheme'])->name('get-all-scheme');
Route::get('get-horticulture-data',[\App\Http\Controllers\Api\ResourceController::class,'getHorticultureData'])->name('get-horticulture-data');
Route::get('get-land-crops',[\App\Http\Controllers\Api\ResourceController::class,'getLandCrops'])->name('get-land-crops');
Route::get('get-all-resources',[\App\Http\Controllers\Api\ResourceController::class,'getAllResources'])->name('get-all-resources');

//LOGIN API

Route::post('login',[\App\Http\Controllers\Api\LoginController::class,'login'])->name('login');
Route::get('check-status/{id}',[\App\Http\Controllers\Api\BasicInfoController::class,'checkStatus'])->name('check-status');
Route::get('check-verification/{id}',[\App\Http\Controllers\Api\BasicInfoController::class,'checkVerification'])->name('check-verification');
Route::get('send-for-approval/{id}',[\App\Http\Controllers\Api\BasicInfoController::class,'sendForApproval'])->name('send-for-approval');

//PROFILE
Route::get('/get-profile/{id}',[\App\Http\Controllers\Api\ProfileController::class,'getProfile'])->name('get-profile');
//BASIC INFORMATION
Route::get('get-all-farmers/{id}',[\App\Http\Controllers\Api\BasicInfoController::class,'getAllFarmers'])->name('get-all-farmers');
Route::get('get-farmer/{id}',[\App\Http\Controllers\Api\BasicInfoController::class,'getFarmerBasicInfo'])->name('get-farmer');
Route::post('submit-farmer-basic-info',[\App\Http\Controllers\Api\BasicInfoController::class,'submitFarmerBasicInfo'])->name('submit-farmer-basic-info');
Route::put('update-farmer-basic-info/{farmerId}',[\App\Http\Controllers\Api\BasicInfoController::class,'editFarmerBasicInfo'])->name('update-farmer-basic-info');
Route::delete('delete-farmer/{id}',[\App\Http\Controllers\Api\BasicInfoController::class,'deleteFarmer'])->name('delete-farmer');

//AGRICULTURE FARM
Route::get('get-agri-farm/{id}',[\App\Http\Controllers\Api\MobileAgriLandController::class,'getFarmerFarms'])->name('get-agri-farm');
Route::post('upload-landholding-file',[\App\Http\Controllers\Api\MobileAgriLandController::class,'uploadLandHolding'])->name('upload-landholding-file');
Route::post('submit-agri-farm',[\App\Http\Controllers\Api\MobileAgriLandController::class,'submitAgriFarm'])->name('submit-agri-farm');
Route::get('get-agri-farm-detail/{id}',[\App\Http\Controllers\Api\MobileAgriLandController::class,'getFarmerAgriLand'])->name('get-agri-farm-detail');
Route::put('update-farm-detail/{id}',[\App\Http\Controllers\Api\MobileAgriLandController::class,'updateAgriLandDetail'])->name('update-farm-detail');
Route::delete('delete-farm-land/{id}',[\App\Http\Controllers\Api\MobileAgriLandController::class,'deleteFarm'])->name('delete-farm-land');

//ADDITIONAL DETAILS
Route::post('upload-additional-file',[\App\Http\Controllers\Api\AdditionalDetailController::class,'uploadDocuments'])->name('upload-additional-file');
Route::post('submit-additional-details',[\App\Http\Controllers\Api\AdditionalDetailController::class,'saveAddtionalDetails'])->name('submit-additional-details');
Route::get('get-additional-details/{id}',[\App\Http\Controllers\Api\AdditionalDetailController::class,'getAdditionalDetails'])->name('get-additional-details');
Route::get('get-farmer-schemes/{id}',[\App\Http\Controllers\Api\AdditionalDetailController::class,'getFarmerScheme'])->name('get-farmer-schemes');
Route::put('update-additional-details/{id}',[\App\Http\Controllers\Api\AdditionalDetailController::class,'updateAdditionalDetail'])->name('update-additional-details');
Route::delete('delete-additional-detail/{id}',[\App\Http\Controllers\Api\AdditionalDetailController::class,'deleteAdditionalDetail'])->name('delete-additional-detail');

//HORTICULTURE DETAILS
Route::post('submit-farmer-horticulture',[\App\Http\Controllers\Api\FarmerHorticultureController::class,'submitHorticultureDetails'])->name('submit-farmer-horticulture');
Route::get('get-horticulture-detail/{id}',[\App\Http\Controllers\Api\FarmerHorticultureController::class,'getHorticultureDetail'])->name('get-horticulture-detail');
Route::put('update-horticulture-details/{id}',[\App\Http\Controllers\Api\FarmerHorticultureController::class,'updateHorticultureDetail'])->name('update-horticulture-details');
Route::delete('delete-horticulture-details/{id}',[\App\Http\Controllers\Api\FarmerHorticultureController::class,'deleteHorticulture'])->name('delete-horticulture-details');

//LAND WATER CONSERVATION
Route::post('submit-land-water',[\App\Http\Controllers\Api\FarmerLandWaterController::class,'submitLandWater'])->name('submit-land-water');
Route::get('get-land-water/{id}',[\App\Http\Controllers\Api\FarmerLandWaterController::class,'getLandWater'])->name('get-land-water');
Route::put('update-land-water/{id}',[\App\Http\Controllers\Api\FarmerLandWaterController::class,'updateLandWater'])->name('update-land-water');
Route::delete('delete-land-water/{id}',[\App\Http\Controllers\Api\FarmerLandWaterController::class,'deleteLandWater'])->name('delete-land-water');

//FISHERIES
Route::post('submit-fisheries',[\App\Http\Controllers\Api\FarmerFisheriesController::class,'submitFisheries'])->name('submit-fisheries');
Route::get('get-fisheries/{id}',[\App\Http\Controllers\Api\FarmerFisheriesController::class,'getFisheries'])->name('get-fisheries');
Route::put('update-fisheries/{id}',[\App\Http\Controllers\Api\FarmerFisheriesController::class,'updateFisheries'])->name('update-fisheries');
Route::delete('delete-fisheries/{id}',[\App\Http\Controllers\Api\FarmerFisheriesController::class,'deleteFisheries'])->name('delete-fisheries');

//ANIMAL HUSBANDRY
Route::post('submit-animal-husbandry',[\App\Http\Controllers\Api\AnimalHusbandryController::class,'submitAnimalHusbandry'])->name('submit-animal-husbandry');
Route::get('get-animal-husbandry/{id}',[\App\Http\Controllers\Api\AnimalHusbandryController::class,'getAnimalHusbandry'])->name('get-animal-husbandry');
Route::put('update-animal-husbandry/{id}',[\App\Http\Controllers\Api\AnimalHusbandryController::class,'updateAnimalHusbandry'])->name('update-animal-husbandry');
Route::delete('delete-animal-husbandry/{id}',[\App\Http\Controllers\Api\AnimalHusbandryController::class,'deleteHusbandry'])->name('delete-animal-husbandry');

//SERICULTURE
Route::post('submit-sericulture',[\App\Http\Controllers\Api\SericultureController::class,'submitSericulture'])->name('submit-sericulture');
Route::get('get-sericulture/{id}',[\App\Http\Controllers\Api\SericultureController::class,'getSericulture'])->name('get-sericulture');
Route::put('update-sericulture/{id}',[\App\Http\Controllers\Api\SericultureController::class,'updateSericulture'])->name('update-sericulture');
Route::delete('delete-sericulture/{id}',[\App\Http\Controllers\Api\SericultureController::class,'deleteSericulture'])->name('delete-sericulture');
