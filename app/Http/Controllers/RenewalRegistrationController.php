<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRenewalRegistrationRequest;
use App\Http\Requests\UpdateRenewalRegistrationRequest;
use App\Models\RenewalRegistration;
use App\Services\RenewalRegistrationService;
use Illuminate\Http\JsonResponse;

class RenewalRegistrationController extends Controller
{
    private RenewalRegistrationService $renewalRegistrationService;

    public function __construct(RenewalRegistrationService $renewalRegistrationService)
    {
        $this->renewalRegistrationService = $renewalRegistrationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(int $generalDataId): JsonResponse
    {
        return $this->renewalRegistrationService->index($generalDataId);
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
    public function store(StoreRenewalRegistrationRequest $request, int $generalDataId): JsonResponse
    {
        return $this->renewalRegistrationService->store($request, $generalDataId);
    }

    /**
     * Display the specified resource.
     */
    public function show(RenewalRegistration $renewalRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RenewalRegistration $renewalRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRenewalRegistrationRequest $request, int $id): JsonResponse
    {
        return $this->renewalRegistrationService->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->renewalRegistrationService->delete($id);
    }
}
