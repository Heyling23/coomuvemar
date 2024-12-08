<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistryTemporaryPermanentWorkersRequest;
use App\Http\Requests\UpdateRegistryTemporaryPermanentWorkersRequest;
use App\Models\RegistryTemporaryPermanentWorkers;
use App\Services\RegistryTemporaryPermanentWorkersService;
use Illuminate\Http\JsonResponse;

class RegistryTemporaryPermanentWorkersController extends Controller
{
    private RegistryTemporaryPermanentWorkersService $service;

    public function __construct(RegistryTemporaryPermanentWorkersService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $generalDataId): JsonResponse
    {
        return $this->service->index($generalDataId);
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
    public function store(StoreRegistryTemporaryPermanentWorkersRequest $request, int $generalDataId): JsonResponse
    {
        return $this->service->store($request, $generalDataId);
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistryTemporaryPermanentWorkers $registryTemporaryPermanentWorkers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistryTemporaryPermanentWorkers $registryTemporaryPermanentWorkers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistryTemporaryPermanentWorkersRequest $request, int $id): JsonResponse
    {
        return $this->service->updated($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->service->delete($id);
    }
}
