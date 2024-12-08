<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSamplingTwoRequest;
use App\Http\Requests\UpdateSamplingTwoRequest;
use App\Models\SamplingTwo;
use App\Services\SamplingTwoService;
use Illuminate\Http\JsonResponse;

class SamplingTwoController extends Controller
{
    private SamplingTwoService $samplingTwoService;

    public function __construct(SamplingTwoService $samplingTwoService)
    {
        $this->samplingTwoService = $samplingTwoService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(int $id): JsonResponse
    {
        return $this->samplingTwoService->index($id);
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
    public function store(StoreSamplingTwoRequest $request, int $samplingTwoId): JsonResponse
    {
        return $this->samplingTwoService->store($request, $samplingTwoId);
    }

    /**
     * Display the specified resource.
     */
    public function show(SamplingTwo $samplingTwo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SamplingTwo $samplingTwo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSamplingTwoRequest $request, int $id): JsonResponse
    {
        return $this->samplingTwoService->updated($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->samplingTwoService->delete($id);
    }
}
