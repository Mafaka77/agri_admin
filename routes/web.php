<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('login',[\App\Http\Controllers\AuthController::class,'index'])->name('login');
Route::post('admin-login', [\App\Http\Controllers\AuthController::class, 'login'])->name('admin-login');
Route::middleware('auth')->group(function () {
    Route::get('logout',[\App\Http\Controllers\HomeController::class,'logout'])->name('logout');
//    Route::get('/', function () {
//        return Inertia::render('HomePage');
//    })->name('dashboard');
//    Route::get('/dashboard', function () {
//        return inertia::render('HomePage');
//    })->name('dashboard');
    Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('dashboard');
    Route::get('/dashboard',[\App\Http\Controllers\HomeController::class,'index'])->name('dashboard');

    Route::get('manage-farmer', [\App\Http\Controllers\ManageFarmerController::class, 'index'])->name('manage-farmer');
    Route::resource('farmer-basic-info', \App\Http\Controllers\FarmersController::class);


//DROPDOWN POPULATE
    Route::get('{district}/sub-division', [\App\Http\Controllers\ManageFarmerController::class, 'getSubDivision'])->name('get-sub-division');
    Route::get('{district}/block', [\App\Http\Controllers\ManageFarmerController::class, 'getBlock'])->name('get-block');
    Route::get('{block}/village', [\App\Http\Controllers\ManageFarmerController::class, 'getVillages'])->name('get-village');
    Route::get('get-village-lgd/{id}', [\App\Http\Controllers\ManageFarmerController::class, 'getVillageLgd'])->name('get-village-lgd');
    Route::get('open-clicked/{id}', [\App\Http\Controllers\ManageFarmerController::class, 'openClicked'])->name('open-clicked');
//    Route::get('to-farmer-agriculture-land/{id}', [\App\Http\Controllers\FarmerDetailsController::class, 'toFarmerAgricultureLand'])->name('to-farmer-agriculture-land');

//FARMER DETAILS
    Route::get('farmer-details/{farmer}', [\App\Http\Controllers\FarmerDetailsController::class, 'index'])->name('farmer-details');
//ADDITIONAL FARMER DETAILS
    Route::get('additional-farmer-details/{id}', [\App\Http\Controllers\AdditionalFarmerDetailsController::class,'index'])->name('to-additional-farmer-details');
    Route::post('upload-ration-card', [\App\Http\Controllers\AdditionalFarmerDetailsController::class,'uploadRationCard'])->name('upload-ration-card');
    Route::post('upload-aadhaar-card', [\App\Http\Controllers\AdditionalFarmerDetailsController::class,'uploadAadhaarCard'])->name('upload-aadhaar-card');
    Route::post('upload-bank-passbook', [\App\Http\Controllers\AdditionalFarmerDetailsController::class,'uploadPassbook'])->name('upload-bank-passbook');
    Route::resource('additional-farmer-details', \App\Http\Controllers\AdditionalFarmerDetailsController::class);

//AGRICULTURE LAND
    Route::get('farmer-agriculture-land/{id}', [\App\Http\Controllers\FarmerAgricultureLandDetailsController::class, 'index'])->name('to-farmer-agriculture-land');
    Route::resource('farmer-agriculture-land', \App\Http\Controllers\FarmerAgricultureLandDetailsController::class);
    Route::post('upload-land-holding-file',[\App\Http\Controllers\FarmerAgricultureLandDetailsController::class,'uploadLandHoldingFile'])->name('upload-land-holding-file');
//HORTICULTURE
    Route::get('farmer-horticulture-land/{id}',[\App\Http\Controllers\FarmerHorticultureFarmDetailsController::class,'index'])->name('farmer-horticulture-land');
    Route::resource('farmer-horticulture-land', \App\Http\Controllers\FarmerHorticultureFarmDetailsController::class);

    //LAND RESOURCE AND WATER CONSERVATION
    Route::get('land-water-conservation/{id}',[\App\Http\Controllers\FarmerLandWaterConservationController::class,'index'])->name('to-land-water-conservation');
    Route::resource('land-water-conservation',\App\Http\Controllers\FarmerLandWaterConservationController::class);

    //FISHERIES
    Route::get('fisheries/{id}',[\App\Http\Controllers\FarmerFisherieController::class,'index'])->name('to-fisheries');
    Route::resource('fisheries',\App\Http\Controllers\FarmerFisherieController::class);
//ANIMAL HUSBANDRY
    Route::get('animal-husbandry/{id}',[\App\Http\Controllers\FarmerAnimalHusbandryDetailsController::class,'index'])->name('to-animal-husbandry');
    Route::resource('animal-husbandry',\App\Http\Controllers\FarmerAnimalHusbandryDetailsController::class);

    //SERICULTURE
    Route::get('sericulture/{id}',[\App\Http\Controllers\FarmerSericultureDetailsController::class,'index'])->name('to-sericulture');
    Route::resource('sericulture',\App\Http\Controllers\FarmerSericultureDetailsController::class);
//ADMIN CONTROLS
    Route::resource('district', \App\Http\Controllers\DistrictController::class);
    Route::resource('sub-division', \App\Http\Controllers\SubDivisionController::class);
    Route::resource('kharif-crops', \App\Http\Controllers\KharifCropsController::class);
    Route::resource('rabi-crops', \App\Http\Controllers\RabiCropsController::class);
    Route::resource('livestock', \App\Http\Controllers\LivestockController::class);
    Route::resource('manage-user',\App\Http\Controllers\ManageUserController::class);

//EDIT ROUTES

});

//Route::get('/dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

//require __DIR__.'/auth.php';
