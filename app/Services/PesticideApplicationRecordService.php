<?php

namespace App\Services;

use App\DTO\PesticideApplicationRecord\PesticideApplicationRecordDTO;
use App\Http\Requests\StorePesticideApplicationRecordRequest;
use App\Http\Requests\UpdatePesticideApplicationRecordRequest;
use App\Models\GeneralData;
use App\Models\PesticideApplicationRecord;
use Illuminate\Http\JsonResponse;
use Throwable;

class PesticideApplicationRecordService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = PesticideApplicationRecord::query()
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

    public function updated(UpdatePesticideApplicationRecordRequest $request, int $id): JsonResponse
    {
        try {
            $result = PesticideApplicationRecord::query()
                ->findOrFail($id)->updateOrFail([
                    'nombres_apellidos_aplicadores' => $request->get('nombres_apellidos_aplicadores'),
                    'plaga_enfermedad' => $request->get('plaga_enfermedad'),
                    'nombre_producto' => $request->get('nombre_producto'),
                    'fecha_aplicacion' => date('Y-m-d', strtotime($request->get('fecha_aplicacion'))),
                    'hora_aplicacion' => $request->get('hora_aplicacion'),
                    'onzas_dosis_bombadas' => $request->get('onzas_dosis_bombadas'),
                    'mz_area_producto_aplicado' => $request->get('mz_area_producto_aplicado'),
                    'lugar_cultivo_producto_aplicado' => $request->get('lugar_cultivo_producto_aplicado'),
                    'litros_total_volumen_aplicado' => $request->get('litros_total_volumen_aplicado'),
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
            $data = PesticideApplicationRecord::query()
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

    public function store(StorePesticideApplicationRecordRequest $request, int $generalDataId): JsonResponse
    {
        try {
            GeneralData::query()->findOrFail($generalDataId);
            $dto = new PesticideApplicationRecordDTO(
                nombres_apellidos_aplicadores: $request->input('nombres_apellidos_aplicadores'),
                plaga_enfermedad: $request->input('plaga_enfermedad'),
                nombre_producto: $request->input('nombre_producto'),
                fecha_aplicacion: date('Y-m-d', strtotime($request->get('fecha_aplicacion'))),
                hora_aplicacion: $request->input('hora_aplicacion'),
                onzas_dosis_bombadas: $request->input('onzas_dosis_bombadas'),
                mz_area_producto_aplicado: $request->input('mz_area_producto_aplicado'),
                lugar_cultivo_producto_aplicado: $request->input('lugar_cultivo_producto_aplicado'),
                litros_total_volumen_aplicado: $request->input('litros_total_volumen_aplicado'),
            );

            $data = PesticideApplicationRecord::query()
                ->create([
                    'nombres_apellidos_aplicadores' => $dto->nombres_apellidos_aplicadores,
                    'plaga_enfermedad' => $dto->plaga_enfermedad,
                    'nombre_producto' => $dto->nombre_producto,
                    'fecha_aplicacion' => $dto->fecha_aplicacion,
                    'hora_aplicacion' => $dto->hora_aplicacion,
                    'onzas_dosis_bombadas' => $dto->onzas_dosis_bombadas,
                    'mz_area_producto_aplicado' => $dto->mz_area_producto_aplicado,
                    'lugar_cultivo_producto_aplicado' => $dto->lugar_cultivo_producto_aplicado,
                    'litros_total_volumen_aplicado' => $dto->litros_total_volumen_aplicado,
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
