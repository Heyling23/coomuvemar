<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CocoaAreaActivitiesRegistryController;
use App\Http\Controllers\EquipmentCleaningRegistrationController;
use App\Http\Controllers\FertilizerApplicationRecordController;
use App\Http\Controllers\GeneralDataController;
use App\Http\Controllers\HarvestRegistrationCocoaController;
use App\Http\Controllers\IntegratedPestManagementActivitiesController;
use App\Http\Controllers\PesticideApplicationRecordController;
use App\Http\Controllers\PestMonitoringRecordDiseasesBeneficialInsectsController;
use App\Http\Controllers\PlantationController;
use App\Http\Controllers\RegistryTemporaryPermanentWorkersController;
use App\Http\Controllers\RenewalRegistrationController;
use App\Http\Controllers\SamplingOneController;
use App\Http\Controllers\SamplingTwoController;
use App\Http\Controllers\SuppliesMaterialsPurchaseRecordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Hello World!';
});
Route::prefix('auth')->group(function () {
    Route::get('/users', [AuthController::class, 'users']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::prefix('general-data')->group(function () {
    Route::get('/{userId}', [GeneralDataController::class, 'index']);
    Route::post('/store/{userId}', [GeneralDataController::class, 'store']);
    Route::put('/update/{id}', [GeneralDataController::class, 'update']);
    Route::delete('/destroy/{id}', [GeneralDataController::class, 'destroy']);
});

Route::prefix('cocoa-harvest-registration')->group(function () {
    Route::get('/{generalDataId}', [HarvestRegistrationCocoaController::class, 'index']);
    Route::post('/store/{generalDataId}', [HarvestRegistrationCocoaController::class, 'store']);
    Route::put('/update/{id}', [HarvestRegistrationCocoaController::class, 'update']);
    Route::delete('/destroy/{id}', [HarvestRegistrationCocoaController::class, 'destroy']);
});

Route::prefix('plantation')->group(function () {
    Route::get('/{generalDataId}', [PlantationController::class, 'index']);
    Route::post('/store/{generalDataId}', [PlantationController::class, 'store']);
    Route::put('/update/{id}', [PlantationController::class, 'update']);
    Route::delete('/destroy/{id}', [PlantationController::class, 'destroy']);
});

Route::prefix('renewal-registration')->group(function () {
    Route::get('/{generalDataId}', [RenewalRegistrationController::class, 'index']);
    Route::post('/store/{generalDataId}', [RenewalRegistrationController::class, 'store']);
    Route::put('/update/{id}', [RenewalRegistrationController::class, 'update']);
    Route::delete('/destroy/{id}', [RenewalRegistrationController::class, 'destroy']);
});

Route::prefix('equipment-cleaning-registration')->group(function () {
    Route::get('/{generalDataId}', [EquipmentCleaningRegistrationController::class, 'index']);
    Route::post('/store/{generalDataId}', [EquipmentCleaningRegistrationController::class, 'store']);
    Route::put('/update/{id}', [EquipmentCleaningRegistrationController::class, 'update']);
    Route::delete('/destroy/{id}', [EquipmentCleaningRegistrationController::class, 'destroy']);
});

Route::prefix('supplies-materials-purchase-record')->group(function () {
    Route::get('/{generalDataId}', [SuppliesMaterialsPurchaseRecordController::class, 'index']);
    Route::post('/store/{generalDataId}', [SuppliesMaterialsPurchaseRecordController::class, 'store']);
    Route::put('/update/{id}', [SuppliesMaterialsPurchaseRecordController::class, 'update']);
    Route::delete('/destroy/{id}', [SuppliesMaterialsPurchaseRecordController::class, 'destroy']);
});

Route::prefix('integrated-pest-management-activities')->group(function () {
    Route::get('/{generalDataId}', [IntegratedPestManagementActivitiesController::class, 'index']);
    Route::post('/store/{generalDataId}', [IntegratedPestManagementActivitiesController::class, 'store']);
    Route::put('/update/{id}', [IntegratedPestManagementActivitiesController::class, 'update']);
    Route::delete('/destroy/{id}', [IntegratedPestManagementActivitiesController::class, 'destroy']);
});

Route::prefix('pest-monitoring-record-diseases-beneficial-insects')->group(function () {
    Route::get('/{generalDataId}', [PestMonitoringRecordDiseasesBeneficialInsectsController::class, 'index']);
    Route::post('/store/{generalDataId}', [PestMonitoringRecordDiseasesBeneficialInsectsController::class, 'store']);
    Route::put('/update/{id}', [PestMonitoringRecordDiseasesBeneficialInsectsController::class, 'update']);
    Route::delete('/destroy/{id}', [PestMonitoringRecordDiseasesBeneficialInsectsController::class, 'destroy']);
});

Route::prefix('registry-temporary-permanent-workers')->group(function () {
    Route::get('/{generalDataId}', [RegistryTemporaryPermanentWorkersController::class, 'index']);
    Route::post('/store/{generalDataId}', [RegistryTemporaryPermanentWorkersController::class, 'store']);
    Route::put('/update/{id}', [RegistryTemporaryPermanentWorkersController::class, 'update']);
    Route::delete('/destroy/{id}', [RegistryTemporaryPermanentWorkersController::class, 'destroy']);
});

Route::prefix('pesticide-application-record')->group(function () {
    Route::get('/{pesticideApplicationRecordId}', [PesticideApplicationRecordController::class, 'index']);
    Route::post('/store/{pesticideApplicationRecordId}', [PesticideApplicationRecordController::class, 'store']);
    Route::put('/update/{id}', [PesticideApplicationRecordController::class, 'update']);
    Route::delete('destroy/{id}', [PesticideApplicationRecordController::class, 'destroy']);
});

Route::prefix('fertilizer-application-record')->group(function () {
    Route::get('/{pesticideApplicationRecordId}', [FertilizerApplicationRecordController::class, 'index']);
    Route::post('/store/{pesticideApplicationRecordId}', [FertilizerApplicationRecordController::class, 'store']);
    Route::put('/update/{id}', [FertilizerApplicationRecordController::class, 'update']);
    Route::delete('/destroy/{id}', [FertilizerApplicationRecordController::class, 'destroy']);
});

Route::prefix('sampling-ones')->group(function () {
    Route::get('/{id}', [SamplingOneController::class, 'index']);
    Route::post('/store/{samplingOneId}', [SamplingOneController::class, 'store']);
    Route::put('/update/{id}', [SamplingOneController::class, 'update']);
    Route::delete('/destroy/{id}', [SamplingOneController::class, 'destroy']);
});

Route::prefix('sampling-twos')->group(function () {
    Route::get('/{id}', [SamplingTwoController::class, 'index']);
    Route::post('/store/{samplingTwoId}', [SamplingTwoController::class, 'store']);
    Route::put('/update/{id}', [SamplingTwoController::class, 'update']);
    Route::delete('/destroy/{id}', [SamplingTwoController::class, 'destroy']);
});

Route::prefix('cocoa-area-activities-registries')->group(function () {
    Route::get('/{id}', [CocoaAreaActivitiesRegistryController::class, 'index']);
    Route::post('/store/{id}', [CocoaAreaActivitiesRegistryController::class, 'store']);
    Route::put('/update/{id}', [CocoaAreaActivitiesRegistryController::class, 'update']);
    Route::delete('/destroy/{id}', [CocoaAreaActivitiesRegistryController::class, 'destroy']);
});
