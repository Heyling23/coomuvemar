<?php

namespace App\Services;

use App\DTO\Plantation\PlantationDTO;
use App\Http\Requests\StorePlantationRequest;
use App\Http\Requests\UpdatePlantationRequest;
use App\Models\GeneralData;
use App\Models\Plantation;
use Illuminate\Http\JsonResponse;
use Throwable;

class PlantationService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = Plantation::query()
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
    public function update(UpdatePlantationRequest $request, int $id): JsonResponse
    {
        try {
            $result = Plantation::query()
                ->findOrFail($id)
                ->updateOrFail([
                    'tipo_poda' => $request->get('tipo_poda'),
                    'numero_plantas_podadas' => $request->get('numero_plantas_podadas'),
                    'fecha_podada' => date('Y-m-d', strtotime($request->get('fecha_podada'))),
                    'mz_area_podada' => $request->get('mz_area_podada'),
                    'tipo_plantacion' => $request->get('tipo_plantacion'),
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
            $plantation = Plantation::query()
                ->where('general_data_id', $generalDataId)
                ->get()
                ->toArray();

            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'data' => $plantation,
            ]);
        } catch (Throwable $exception) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function store(StorePlantationRequest $plantationRequest, int $generalDataId): JsonResponse
    {
        try {
            GeneralData::query()
                ->findOrFail($generalDataId);

            $plantationDTO = new PlantationDTO(
                tipo_poda: $plantationRequest->get('tipo_poda'),
                numero_plantas_podadas: $plantationRequest->get('numero_plantas_podadas'),
                fecha_podada: date('Y-m-d', strtotime($plantationRequest->get('fecha_podada'))),
                mz_area_podada: $plantationRequest->get('mz_area_podada'),
                tipo_plantacion: $plantationRequest->get('tipo_plantacion')
            );

            $plantation = Plantation::query()
                ->create([
                    'tipo_poda' => $plantationDTO->tipo_poda,
                    'numero_plantas_podadas' => $plantationDTO->numero_plantas_podadas,
                    'fecha_podada' => $plantationDTO->fecha_podada,
                    'mz_area_podada' => $plantationDTO->mz_area_podada,
                    'tipo_plantacion' => $plantationDTO->tipo_plantacion,
                    'general_data_id' => $generalDataId,
                ]);

            return response()->json([
                'status' => true,
                'statusCode' => 201,
                'data' => $plantation,
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
