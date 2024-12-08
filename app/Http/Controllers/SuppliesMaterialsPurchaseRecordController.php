<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuppliesMaterialsPurchaseRecordRequest;
use App\Http\Requests\UpdateSuppliesMaterialsPurchaseRecordRequest;
use App\Models\SuppliesMaterialsPurchaseRecord;
use App\Services\SuppliesMaterialsPurchaseRecordService;
use Illuminate\Http\JsonResponse;

class SuppliesMaterialsPurchaseRecordController extends Controller
{
    private SuppliesMaterialsPurchaseRecordService $supplyMaterialsPurchaseRecordService;

    public function __construct(SuppliesMaterialsPurchaseRecordService $supplyMaterialsPurchaseRecordService)
    {
        $this->supplyMaterialsPurchaseRecordService = $supplyMaterialsPurchaseRecordService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $generalDataId): JsonResponse
    {
        return $this->supplyMaterialsPurchaseRecordService->index($generalDataId);
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
    public function store(StoreSuppliesMaterialsPurchaseRecordRequest $request, int $generalDataId): JsonResponse
    {
        return $this->supplyMaterialsPurchaseRecordService->store($request, $generalDataId);
    }

    /**
     * Display the specified resource.
     */
    public function show(SuppliesMaterialsPurchaseRecord $suppliesMaterialsPurchaseRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuppliesMaterialsPurchaseRecord $suppliesMaterialsPurchaseRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuppliesMaterialsPurchaseRecordRequest $request, int $id): JsonResponse
    {
        return $this->supplyMaterialsPurchaseRecordService->updated($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->supplyMaterialsPurchaseRecordService->delete($id);
    }
}
