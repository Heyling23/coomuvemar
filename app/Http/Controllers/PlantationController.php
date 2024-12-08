<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlantationRequest;
use App\Http\Requests\UpdatePlantationRequest;
use App\Models\Plantation;
use App\Services\PlantationService;
use Illuminate\Http\JsonResponse;

class PlantationController extends Controller
{
    private PlantationService $plantationService;

    public function __construct(PlantationService $plantationService)
    {
        $this->plantationService = $plantationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(int $generalDataId): JsonResponse
    {
        return $this->plantationService->index($generalDataId);
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
    public function store(StorePlantationRequest $request, int $generalDataId): JsonResponse
    {
        return $this->plantationService->store($request, $generalDataId);
    }

    /**
     * Display the specified resource.
     */
    public function show(Plantation $plantation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plantation $plantation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlantationRequest $request, int $id): JsonResponse
    {
        return $this->plantationService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->plantationService->delete($id);
    }
}
