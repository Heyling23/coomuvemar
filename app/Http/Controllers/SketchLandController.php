<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSketchLandRequest;
use App\Http\Requests\UpdateSketchLandRequest;
use App\Models\SketchLand;
use App\Services\SketchLandService;
use Illuminate\Http\JsonResponse;

class SketchLandController extends Controller
{
    private SketchLandService $sketchLandService;

    public function __construct(SketchLandService $sketchLandService)
    {
        $this->sketchLandService = $sketchLandService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $generalDataId): JsonResponse
    {
        return $this->sketchLandService->index($generalDataId);
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
    public function store(StoreSketchLandRequest $request, int $generalDataId): JsonResponse
    {
        return $this->sketchLandService->store($request, $generalDataId);
    }

    /**
     * Display the specified resource.
     */
    public function show(SketchLand $sketchLand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SketchLand $sketchLand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSketchLandRequest $request, int $id): JsonResponse
    {
        return $this->sketchLandService->updated($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->sketchLandService->delete($id);
    }
}
