<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFertilizerApplicationRecordRequest;
use App\Http\Requests\UpdateFertilizerApplicationRecordRequest;
use App\Models\FertilizerApplicationRecord;
use App\Services\FertilizerApplicationRecordService;
use Illuminate\Http\JsonResponse;

class FertilizerApplicationRecordController extends Controller
{
    private FertilizerApplicationRecordService $fertilizerApplicationRecordService;

    public function __construct(FertilizerApplicationRecordService $fertilizerApplicationRecordService)
    {
        $this->fertilizerApplicationRecordService = $fertilizerApplicationRecordService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(int $pesticideApplicationRecordId): JsonResponse
    {
        return $this->fertilizerApplicationRecordService->index($pesticideApplicationRecordId);
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
    public function store(StoreFertilizerApplicationRecordRequest $request, int $pesticideApplicationRecordId): JsonResponse
    {
        return $this->fertilizerApplicationRecordService->store($request, $pesticideApplicationRecordId);
    }

    /**
     * Display the specified resource.
     */
    public function show(FertilizerApplicationRecord $fertilizerApplicationRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FertilizerApplicationRecord $fertilizerApplicationRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFertilizerApplicationRecordRequest $request, int $id): JsonResponse
    {
        return $this->fertilizerApplicationRecordService->updated($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->fertilizerApplicationRecordService->delete($id);
    }
}
