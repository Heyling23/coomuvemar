<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipmentCleaningRegistrationRequest;
use App\Http\Requests\UpdateEquipmentCleaningRegistrationRequest;
use App\Models\EquipmentCleaningRegistration;
use App\Services\EquipmentCleaningRegistrationService;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info (
 *     title="EquipmentCleaningRegistrationController",
 *     version="1.0",
 *     description=""
 * )
 */
class EquipmentCleaningRegistrationController extends Controller
{
    private EquipmentCleaningRegistrationService $equipmentCleaningRegistrationService;

    public function __construct(EquipmentCleaningRegistrationService $equipmentCleaningRegistrationService)
    {
        $this->equipmentCleaningRegistrationService = $equipmentCleaningRegistrationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $generalDataId): JsonResponse
    {
        return $this->equipmentCleaningRegistrationService->index($generalDataId);
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
    public function store(StoreEquipmentCleaningRegistrationRequest $request, int $generalDataId): JsonResponse
    {
        return $this->equipmentCleaningRegistrationService->store($request, $generalDataId);
    }

    /**
     * Display the specified resource.
     */
    public function show(EquipmentCleaningRegistration $equipmentCleaningRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EquipmentCleaningRegistration $equipmentCleaningRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipmentCleaningRegistrationRequest $request, int $id): JsonResponse
    {
        return $this->equipmentCleaningRegistrationService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->equipmentCleaningRegistrationService->delete($id);
    }
}
