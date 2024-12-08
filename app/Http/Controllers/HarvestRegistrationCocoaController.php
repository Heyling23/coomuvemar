<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHarvestRegistrationCocoaRequest;
use App\Http\Requests\UpdateHarvestRegistrationCocoaRequest;
use App\Models\HarvestRegistrationCocoa;
use App\Services\HarvestRegistrationCocoaService;
use Illuminate\Http\JsonResponse;

class HarvestRegistrationCocoaController extends Controller
{
    private HarvestRegistrationCocoaService $harvestRegistrationCocoaService;

    public function __construct(HarvestRegistrationCocoaService $harvestRegistrationCocoaService)
    {
        $this->harvestRegistrationCocoaService = $harvestRegistrationCocoaService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $generalDataId): JsonResponse
    {
        return $this->harvestRegistrationCocoaService->index($generalDataId);
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
    public function store(StoreHarvestRegistrationCocoaRequest $request, int $generalDataId): JsonResponse
    {
        return $this->harvestRegistrationCocoaService->store($request, $generalDataId);
    }

    /**
     * Display the specified resource.
     */
    public function show(HarvestRegistrationCocoa $harvestRegistrationCocoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HarvestRegistrationCocoa $harvestRegistrationCocoa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHarvestRegistrationCocoaRequest $request, int $id): JsonResponse
    {
        return $this->harvestRegistrationCocoaService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->harvestRegistrationCocoaService->delete($id);
    }
}
