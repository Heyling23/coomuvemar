<?php

namespace App\Services;

use App\DTO\EquipmentCleaningRegistration\EquipmentCleaningRegistrationDTO;
use App\Http\Requests\StoreEquipmentCleaningRegistrationRequest;
use App\Http\Requests\UpdateEquipmentCleaningRegistrationRequest;
use App\Models\EquipmentCleaningRegistration;
use App\Models\GeneralData;
use Illuminate\Http\JsonResponse;
use Throwable;

class EquipmentCleaningRegistrationService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = EquipmentCleaningRegistration::query()
                ->findOrFail($id)->delete();

            return response()->json([
                'status' => $result,
                'statusCode' => 200,
                'message' => 'Registro eliminado exitosamente',
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(UpdateEquipmentCleaningRegistrationRequest $request, int $id): JsonResponse
    {
        try {
            $result = EquipmentCleaningRegistration::query()
                ->findOrFail($id)->updateOrFail([
                    'actividad' => $request->get('actividad'),
                    'equipo' => $request->get('equipo'),
                    'fecha_uso' => date('Y-m-d', strtotime($request->get('fecha_uso'))),
                    'productos_usados_limpiar_producto' => json_encode($request->get('productos_usados_limpiar_producto')),
                ]);

            return response()->json([
                'status' => $result,
                'statusCode' => 200,
                'message' => 'Registro actualizado correctamente',
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function index(int $generalDataId): JsonResponse
    {
        try {
            $equipmentCleaningRegistration = EquipmentCleaningRegistration::query()
                ->where('general_data_id', $generalDataId)
                ->get()
                ->toArray();

            for ($i = 0; $i < count($equipmentCleaningRegistration); $i++) {
                $equipmentCleaningRegistration[$i]['productos_usados_limpiar_producto'] = json_decode($equipmentCleaningRegistration[$i]['productos_usados_limpiar_producto']);
            }

            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'data' => $equipmentCleaningRegistration,
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(StoreEquipmentCleaningRegistrationRequest $request, int $generalDataId): JsonResponse
    {
        try {
            GeneralData::query()
                ->findOrFail($generalDataId);

            $equipmentCleaningRegDTO = new EquipmentCleaningRegistrationDTO(
                actividad: $request->get('actividad'),
                equipo: $request->get('equipo'),
                fecha_uso: date('Y-m-d', strtotime($request->get('fecha_uso'))),
                productos_usados_limpiar_producto: $request->get('productos_usados_limpiar_producto'),
            );

            $equipmentCleaningRegistration = EquipmentCleaningRegistration::query()
                ->create([
                    'actividad' => $equipmentCleaningRegDTO->actividad,
                    'equipo' => $equipmentCleaningRegDTO->equipo,
                    'fecha_uso' => $equipmentCleaningRegDTO->fecha_uso,
                    'productos_usados_limpiar_producto' => json_encode($equipmentCleaningRegDTO->productos_usados_limpiar_producto),
                    'general_data_id' => $generalDataId,
                ]);

            return response()->json([
                'status' => true,
                'statusCode' => 201,
                'data' => $equipmentCleaningRegistration,
            ], 201);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
