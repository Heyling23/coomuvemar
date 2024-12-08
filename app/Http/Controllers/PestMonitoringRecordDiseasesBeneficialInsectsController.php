<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePestMonitoringRecordDiseasesBeneficialInsectsRequest;
use App\Http\Requests\UpdatePestMonitoringRecordDiseasesBeneficialInsectsRequest;
use App\Models\PestMonitoringRecordDiseasesBeneficialInsects;
use App\Services\PestMonitoringRecordDiseasesBeneficialInsectsService;
use Illuminate\Http\JsonResponse;

class PestMonitoringRecordDiseasesBeneficialInsectsController extends Controller
{
    private PestMonitoringRecordDiseasesBeneficialInsectsService $service;

    public function __construct(PestMonitoringRecordDiseasesBeneficialInsectsService $service)
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
    public function store(StorePestMonitoringRecordDiseasesBeneficialInsectsRequest $request, int $generalDataId): JsonResponse
    {
        return $this->service->store($request, $generalDataId);
    }

    /**
     * Display the specified resource.
     */
    public function show(PestMonitoringRecordDiseasesBeneficialInsects $pestMonitoringRecordDiseasesBeneficialInsects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PestMonitoringRecordDiseasesBeneficialInsects $pestMonitoringRecordDiseasesBeneficialInsects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePestMonitoringRecordDiseasesBeneficialInsectsRequest $request, int $id): JsonResponse
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
