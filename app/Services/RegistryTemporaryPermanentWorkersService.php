<?php

namespace App\Services;

use App\DTO\RegistryTemporaryPermanentWorkers\RegistryTemporaryPermanentWorkersDTO;
use App\Http\Requests\StoreRegistryTemporaryPermanentWorkersRequest;
use App\Http\Requests\UpdateRegistryTemporaryPermanentWorkersRequest;
use App\Models\GeneralData;
use App\Models\RegistryTemporaryPermanentWorkers;
use Illuminate\Http\JsonResponse;
use Throwable;

class RegistryTemporaryPermanentWorkersService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = RegistryTemporaryPermanentWorkers::query()
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

    public function updated(UpdateRegistryTemporaryPermanentWorkersRequest $request, int $id): JsonResponse
    {
        try {
            $result = RegistryTemporaryPermanentWorkers::query()
                ->findOrFail($id)->updateOrFail([
                    'nombres_apellidos' => $request->get('nombres_apellidos'),
                    'sexo' => $request->get('sexo'),
                    'cedula' => $request->get('cedula'),
                    'es_temporal' => $request->get('es_temporal'),
                    'numero_dias_trabajados_mes' => $request->get('numero_dias_trabajados_mes'),
                    'numero_dias_trabajados_anio' => $request->get('numero_dias_trabajados_anio'),
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

    public function index($generalDataId): JsonResponse
    {
        try {
            $data = RegistryTemporaryPermanentWorkers::query()
                ->where('general_data_id', $generalDataId)
                ->get()
                ->toArray();

            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'data' => $data,
            ]);
        } catch (Throwable $exception) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function store(StoreRegistryTemporaryPermanentWorkersRequest $request, int $generalDataId): JsonResponse
    {
        try {
            GeneralData::query()->findOrFail($generalDataId);

            $dto = new RegistryTemporaryPermanentWorkersDTO(
                nombres_apellidos: $request->get('nombres_apellidos'),
                sexo: $request->get('sexo'),
                cedula: $request->get('cedula'),
                es_temporal: $request->get('es_temporal'),
                numero_dias_trabajados_mes: $request->get('numero_dias_trabajados_mes'),
                numero_dias_trabajados_anio: $request->get('numero_dias_trabajados_anio'),
            );

            $data = RegistryTemporaryPermanentWorkers::query()
                ->create([
                    'nombres_apellidos' => $dto->nombres_apellidos,
                    'sexo' => $dto->sexo,
                    'cedula' => $dto->cedula,
                    'es_temporal' => $dto->es_temporal,
                    'numero_dias_trabajados_mes' => $dto->numero_dias_trabajados_mes,
                    'numero_dias_trabajados_anio' => $dto->numero_dias_trabajados_anio,
                    'general_data_id' => $generalDataId,
                ]);

            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'data' => $data,
            ]);
        } catch (Throwable $exception) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }
}
