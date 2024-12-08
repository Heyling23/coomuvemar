<?php

namespace App\Services;

use App\DTO\PestMonitoringRecordDiseasesBeneficialInsects\PestMonitoringRecordDiseasesBeneficialInsectsDTO;
use App\Http\Requests\StorePestMonitoringRecordDiseasesBeneficialInsectsRequest;
use App\Http\Requests\UpdatePestMonitoringRecordDiseasesBeneficialInsectsRequest;
use App\Models\GeneralData;
use App\Models\PestMonitoringRecordDiseasesBeneficialInsects;
use Illuminate\Http\JsonResponse;
use Throwable;

class PestMonitoringRecordDiseasesBeneficialInsectsService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = PestMonitoringRecordDiseasesBeneficialInsects::query()
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

    public function updated(UpdatePestMonitoringRecordDiseasesBeneficialInsectsRequest $request, int $id): JsonResponse
    {
        try {
            $result = PestMonitoringRecordDiseasesBeneficialInsects::query()
                ->findOrFail($id)->updateOrFail([
                    'fecha_monitoreo' => date('Y-m-d', strtotime($request->get('fecha_monitoreo'))),
                    'nombre_plaga_enfermedad' => $request->get('nombre_plaga_enfermedad'),
                    'numero_plantas_afectadas_2' => $request->get('numero_plantas_afectadas_2'),
                    'numero_mazorcas_afectadas_2' => $request->get('numero_mazorcas_afectadas_2'),
                    'numero_plantas_afectadas_1' => $request->get('numero_plantas_afectadas_1'),
                    'numero_mazorcas_afectadas_1' => $request->get('numero_mazorcas_afectadas_1'),
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
            $data = PestMonitoringRecordDiseasesBeneficialInsects::query()
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

    public function store(StorePestMonitoringRecordDiseasesBeneficialInsectsRequest $request, int $generalDataId): JsonResponse
    {
        try {
            GeneralData::query()->findOrFail($generalDataId);
            $dto = new PestMonitoringRecordDiseasesBeneficialInsectsDTO(
                fecha_monitoreo: date('Y-m-d', strtotime($request->get('fecha_monitoreo'))),
                nombre_plaga_enfermedad: $request->get('nombre_plaga_enfermedad'),
                numero_plantas_afectadas_2: $request->get('numero_plantas_afectadas_2'),
                numero_mazorcas_afectadas_2: $request->get('numero_mazorcas_afectadas_2'),
                numero_plantas_afectadas_1: $request->get('numero_plantas_afectadas_1'),
                numero_mazorcas_afectadas_1: $request->get('numero_mazorcas_afectadas_1'),
            );
            $storage = PestMonitoringRecordDiseasesBeneficialInsects::query()
                ->create([
                    'general_data_id' => $generalDataId,
                    'fecha_monitoreo' => $dto->fecha_monitoreo,
                    'nombre_plaga_enfermedad' => $dto->nombre_plaga_enfermedad,
                    'numero_plantas_afectadas_2' => $dto->numero_plantas_afectadas_2,
                    'numero_mazorcas_afectadas_2' => $dto->numero_mazorcas_afectadas_2,
                    'numero_plantas_afectadas_1' => $dto->numero_plantas_afectadas_1,
                    'numero_mazorcas_afectadas_1' => $dto->numero_mazorcas_afectadas_1,
                ]);

            return response()->json([
                'status' => true,
                'statusCode' => 201,
                'data' => $storage,
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
