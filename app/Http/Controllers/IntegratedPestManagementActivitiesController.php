<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIntegratedPestManagementActivitiesRequest;
use App\Http\Requests\UpdateIntegratedPestManagementActivitiesRequest;
use App\Models\IntegratedPestManagementActivities;
use App\Services\IntegratedPestManagementActivitiesService;
use Illuminate\Http\JsonResponse;

class IntegratedPestManagementActivitiesController extends Controller
{
    private IntegratedPestManagementActivitiesService $integratedPestManagementActivitiesService;

    public function __construct(IntegratedPestManagementActivitiesService $integratedPestManagementActivitiesService)
    {
        $this->integratedPestManagementActivitiesService = $integratedPestManagementActivitiesService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $generalDataId): JsonResponse
    {
        return $this->integratedPestManagementActivitiesService->index($generalDataId);
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
    public function store(StoreIntegratedPestManagementActivitiesRequest $request, int $generalDataId): JsonResponse
    {
        return $this->integratedPestManagementActivitiesService->store($request, $generalDataId);
    }

    /**
     * Display the specified resource.
     */
    public function show(IntegratedPestManagementActivities $integratedPestManagementActivities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IntegratedPestManagementActivities $integratedPestManagementActivities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIntegratedPestManagementActivitiesRequest $request, int $id): JsonResponse
    {
        return $this->integratedPestManagementActivitiesService->updated($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->integratedPestManagementActivitiesService->delete($id);
    }
}
