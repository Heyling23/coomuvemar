<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSamplingOneRequest;
use App\Http\Requests\UpdateSamplingOneRequest;
use App\Models\SamplingOne;
use App\Services\SamplingOneService;
use Illuminate\Http\JsonResponse;

class SamplingOneController extends Controller
{
    private SamplingOneService $samplingOneService;

    public function __construct(SamplingOneService $samplingOneService)
    {
        $this->samplingOneService = $samplingOneService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $id): JsonResponse
    {
        return $this->samplingOneService->index($id);
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
    public function store(StoreSamplingOneRequest $request, int $pestMonitoringRecordDiseasesBeneficialInsectsId): JsonResponse
    {
        return $this->samplingOneService->store($request, $pestMonitoringRecordDiseasesBeneficialInsectsId);
    }

    /**
     * Display the specified resource.
     */
    public function show(SamplingOne $samplingOne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SamplingOne $samplingOne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSamplingOneRequest $request, int $id): JsonResponse
    {
        return $this->samplingOneService->updated($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->samplingOneService->delete($id);
    }
}
