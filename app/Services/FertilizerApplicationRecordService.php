<?php

namespace App\Services;

use App\DTO\FertilizerApplicationRecord\FertilizerApplicationRecordDTO;
use App\Http\Requests\StoreFertilizerApplicationRecordRequest;
use App\Http\Requests\UpdateFertilizerApplicationRecordRequest;
use App\Models\FertilizerApplicationRecord;
use App\Models\GeneralData;
use App\Models\SuppliesMaterialsPurchaseRecord;
use Illuminate\Http\JsonResponse;
use Throwable;

class FertilizerApplicationRecordService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = FertilizerApplicationRecord::query()
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

    public function updated(UpdateFertilizerApplicationRecordRequest $request, int $id): JsonResponse
    {
        try {
            $result = FertilizerApplicationRecord::query()
                ->findOrFail($id)->updateOrFail([
                    'nombre_fertilizante' => $request->get('nombre_fertilizante'),
                    'lugar_aplicacion' => $request->get('lugar_aplicacion'),
                    'tipo_insumo' => $request->get('tipo_insumo'),
                    'procedencia_fertilizante' => $request->get('procedencia_fertilizante'),
                    'dosis_planta' => $request->get('dosis_planta'),
                    'dosis_manzana' => $request->get('dosis_manzana'),
                    'veces_aplicado_anio' => $request->get('veces_aplicado_anio'),
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
            $data = FertilizerApplicationRecord::query()
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

    public function store(StoreFertilizerApplicationRecordRequest $request, int $generalDataId): JsonResponse
    {
        try {
            GeneralData::query()->findOrFail($generalDataId);
            $dto = new FertilizerApplicationRecordDTO(
                nombre_fertilizante: $request->get('nombre_fertilizante'),
                lugar_aplicacion: $request->get('lugar_aplicacion'),
                tipo_insumo: $request->get('tipo_insumo'),
                procedencia_fertilizante: $request->get('procedencia_fertilizante'),
                dosis_planta: $request->get('dosis_planta'),
                dosis_manzana: $request->get('dosis_manzana'),
                veces_aplicado_anio: $request->get('veces_aplicado_anio'),
            );

            $data = FertilizerApplicationRecord::query()
                ->create([
                    'nombre_fertilizante' => $dto->nombre_fertilizante,
                    'lugar_aplicacion' => $dto->lugar_aplicacion,
                    'tipo_insumo' => $dto->tipo_insumo,
                    'procedencia_fertilizante' => $dto->procedencia_fertilizante,
                    'dosis_planta' => $dto->dosis_planta,
                    'dosis_manzana' => $dto->dosis_manzana,
                    'veces_aplicado_anio' => $dto->veces_aplicado_anio,
                    'general_data_id' => $generalDataId,
                ]);

            return response()->json([
                'status' => true,
                'statusCode' => 201,
                'data' => $data,
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
