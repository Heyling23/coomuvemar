<?php

namespace App\Services;

use App\DTO\SamplingOne\SamplingOneDTO;
use App\Http\Requests\StoreSamplingTwoRequest;
use App\Http\Requests\UpdateSamplingTwoRequest;
use App\Models\PestMonitoringRecordDiseasesBeneficialInsects;
use App\Models\SamplingTwo;
use Illuminate\Http\JsonResponse;
use Throwable;

class SamplingTwoService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = SamplingTwo::query()
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

    public function updated(UpdateSamplingTwoRequest $request, int $id): JsonResponse
    {
        try {
            $result = SamplingTwo::query()
                ->findOrFail($id)->updateOrFail([
                    'numero_plantas_afectadas' => $request->get('numero_plantas_afectadas'),
                    'numero_mazorcas_afectadas' => $request->get('numero_mazorcas_afectadas'),
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

    public function index(int $pestMonitoringRecordDiseasesBeneficialInsectsId): JsonResponse
    {
        try {
            $data = SamplingTwo::query()
                ->where('pest_monitoring_record_diseases_beneficial_insects_id', $pestMonitoringRecordDiseasesBeneficialInsectsId)
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

    public function store(StoreSamplingTwoRequest $request, int $pestMonitoringRecordDiseasesBeneficialInsectsId): JsonResponse
    {
        try {
            PestMonitoringRecordDiseasesBeneficialInsects::query()->findOrFail($pestMonitoringRecordDiseasesBeneficialInsectsId);
            $dto = new SamplingOneDTO(
                numero_plantas_afectadas: $request->input('numero_plantas_afectadas'),
                numero_mazorcas_afectadas: $request->input('numero_mazorcas_afectadas'),
            );

            $data = SamplingTwo::query()
                ->create([
                    'numero_plantas_afectadas' => $dto->numero_plantas_afectadas,
                    'numero_mazorcas_afectadas' => $dto->numero_mazorcas_afectadas,
                    'pest_monitoring_record_diseases_beneficial_insects_id' => $pestMonitoringRecordDiseasesBeneficialInsectsId,
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
