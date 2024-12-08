<?php

namespace App\Services;

use App\DTO\RenewalRegistration\RenewalRegistrationDTO;
use App\Http\Requests\StoreRenewalRegistrationRequest;
use App\Http\Requests\UpdateRenewalRegistrationRequest;
use App\Models\GeneralData;
use App\Models\RenewalRegistration;
use Illuminate\Http\JsonResponse;
use Throwable;

class RenewalRegistrationService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = RenewalRegistration::query()
                ->findOrFail($id)->delete();

            return response()->json([
                'status' => $result,
                'statusCode' => 200,
                'message' => 'Registro eliminado exitosamente',
            ]);
        } catch (Throwable $exception) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateRenewalRegistrationRequest $request, int $id): JsonResponse
    {
        try {
            $result = RenewalRegistration::query()
                ->findOrFail($id)
                ->updateOrFail([
                    'fecha_injertacion' => date('Y-m-d', strtotime($request->get('fecha_injertacion'))),
                    'numero_plantas_injertada_por_mz' => $request->get('numero_plantas_injertada_por_mz'),
                    'nombre_clones_injertados' => json_encode($request->get('nombre_clones_injertados')),
                    'nombre_proveedor' => $request->get('nombre_proveedor'),
                ]);

            return response()->json([
                'status' => $result,
                'statusCode' => 200,
                'message' => 'Registro actualizado correctamente',
            ]);
        } catch (Throwable $exception) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function index(int $generalDataId): JsonResponse
    {
        try {
            $renewalRegistration = RenewalRegistration::query()
                ->where('general_data_id', $generalDataId)
                ->get()
                ->toArray();

            for ($i = 0; $i < count($renewalRegistration); $i++) {
                $renewalRegistration[$i]['nombre_clones_injertados'] = json_decode($renewalRegistration[$i]['nombre_clones_injertados']);
            }

            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'data' => $renewalRegistration,
            ]);
        } catch (Throwable $exception) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function store(StoreRenewalRegistrationRequest $request, int $generalDataId): JsonResponse
    {
        try {
            GeneralData::query()
                ->findOrFail($generalDataId);

            $renewalRegistrationDTO = new RenewalRegistrationDTO(
                fecha_injertacion: date('Y-m-d', strtotime($request->get('fecha_injertacion'))),
                numero_plantas_injertada_por_mz: $request->get('numero_plantas_injertada_por_mz'),
                nombre_clones_injertados: $request->get('nombre_clones_injertados'),
                nombre_proveedor: $request->get('nombre_proveedor'),
            );

            $renewalRegistration = RenewalRegistration::query()
                ->create([
                    'fecha_injertacion' => $renewalRegistrationDTO->fecha_injertacion,
                    'numero_plantas_injertada_por_mz' => $renewalRegistrationDTO->numero_plantas_injertada_por_mz,
                    'nombre_clones_injertados' => json_encode($renewalRegistrationDTO->nombre_clones_injertados),
                    'nombre_proveedor' => $renewalRegistrationDTO->nombre_proveedor,
                    'general_data_id' => $generalDataId,
                ]);

            return response()->json([
                'status' => true,
                'statusCode' => 201,
                'data' => $renewalRegistration,
            ], 201);
        } catch (Throwable $exception) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}
