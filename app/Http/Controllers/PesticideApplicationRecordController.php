<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePesticideApplicationRecordRequest;
use App\Http\Requests\UpdatePesticideApplicationRecordRequest;
use App\Models\PesticideApplicationRecord;
use App\Services\PesticideApplicationRecordService;
use Illuminate\Http\JsonResponse;

class PesticideApplicationRecordController extends Controller
{
    private PesticideApplicationRecordService $pesticideApplicationRecordService;

    public function __construct(PesticideApplicationRecordService $pesticideApplicationRecordService)
    {
        $this->pesticideApplicationRecordService = $pesticideApplicationRecordService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $pesticideApplicationRecordId): JsonResponse
    {
        return $this->pesticideApplicationRecordService->index($pesticideApplicationRecordId);
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
    public function store(StorePesticideApplicationRecordRequest $request, int $pesticideApplicationRecordId): JsonResponse
    {
        return $this->pesticideApplicationRecordService->store($request, $pesticideApplicationRecordId);
    }

    /**
     * Display the specified resource.
     */
    public function show(PesticideApplicationRecord $pesticideApplicationRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesticideApplicationRecord $pesticideApplicationRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePesticideApplicationRecordRequest $request, int $id): JsonResponse
    {
        return $this->pesticideApplicationRecordService->updated($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->pesticideApplicationRecordService->delete($id);
    }
}
