<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCocoaAreaActivitiesRegistryRequest;
use App\Http\Requests\UpdateCocoaAreaActivitiesRegistryRequest;
use App\Models\CocoaAreaActivitiesRegistry;
use App\Services\CocoaAreaActivitiesRegistryService;
use Illuminate\Http\JsonResponse;

class CocoaAreaActivitiesRegistryController extends Controller
{
    private CocoaAreaActivitiesRegistryService $cocoaAreaActivitiesRegistryService;

    public function __construct(CocoaAreaActivitiesRegistryService $cocoaAreaActivitiesRegistryService)
    {
        $this->cocoaAreaActivitiesRegistryService = $cocoaAreaActivitiesRegistryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $id): JsonResponse
    {
        return $this->cocoaAreaActivitiesRegistryService->index($id);
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
    public function store(StoreCocoaAreaActivitiesRegistryRequest $request, int $id): JsonResponse
    {
        return $this->cocoaAreaActivitiesRegistryService->store($request, $id);
    }

    /**
     * Display the specified resource.
     */
    public function show(CocoaAreaActivitiesRegistry $cocoaAreaActivitiesRegistry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CocoaAreaActivitiesRegistry $cocoaAreaActivitiesRegistry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCocoaAreaActivitiesRegistryRequest $request, int $id): JsonResponse
    {
        return $this->cocoaAreaActivitiesRegistryService->updated($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->cocoaAreaActivitiesRegistryService->delete($id);
    }
}
