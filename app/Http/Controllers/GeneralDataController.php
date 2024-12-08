<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGeneralDataRequest;
use App\Http\Requests\UpdateGeneralDataRequest;
use App\Models\GeneralData;
use App\Services\GeneralDataService;
use Illuminate\Http\JsonResponse;

class GeneralDataController extends Controller
{
    private GeneralDataService $generalDataService;

    public function __construct(GeneralDataService $generalDataService)
    {
        $this->generalDataService = $generalDataService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $userId): JsonResponse
    {
        return $this->generalDataService->index($userId);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGeneralDataRequest $request, int $userId): JsonResponse
    {
        return $this->generalDataService->store($request, $userId);
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneralData $generalData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralData $generalData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGeneralDataRequest $request, int $id): JsonResponse
    {
        return $this->generalDataService->updated($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->generalDataService->delete($id);
    }
}
