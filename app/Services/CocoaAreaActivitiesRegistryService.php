<?php

namespace App\Services;

use App\DTO\CocoaAreaActivitiesRegistry\CocoaAreaActivitiesRegistryDTO;
use App\Http\Requests\StoreCocoaAreaActivitiesRegistryRequest;
use App\Http\Requests\UpdateCocoaAreaActivitiesRegistryRequest;
use App\Models\CocoaAreaActivitiesRegistry;
use App\Models\GeneralData;
use App\Models\RegistryTemporaryPermanentWorkers;
use Illuminate\Http\JsonResponse;
use Throwable;

class CocoaAreaActivitiesRegistryService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = CocoaAreaActivitiesRegistry::query()
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

    public function updated(UpdateCocoaAreaActivitiesRegistryRequest $request, int $id): JsonResponse
    {
        try {
            $result = CocoaAreaActivitiesRegistry::query()
                ->findOrFail($id)->updateOrFail([
                    'actividad' => $request->get('actividad'),
                    'nombre_trabajador' => $request->get('nombre_trabajador'),
                    'sexo' => $request->get('sexo'),
                    'cedula' => $request->get('cedula'),
                    'dias_trabajados' => $request->get('dias_trabajados'),
                    'pago_dia' => $request->get('pago_dia'),
                    'pago_total' => $request->get('pago_total'),
                    'pago_mensual' => $request->get('pago_mensual'),
                    'fecha_pago' => date('Y-m-d', strtotime($request->get('fecha_pago'))),
                    'firma' => $request->get('firma'),
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

    public function store(StoreCocoaAreaActivitiesRegistryRequest $request, int $id): JsonResponse
    {
        try {
            GeneralData::query()->findOrFail($id);
            $dto = new CocoaAreaActivitiesRegistryDto(
                actividad: $request->get('actividad'),
                nombre_trabajador: $request->get('nombre_trabajador'),
                sexo: $request->get('sexo'),
                cedula: $request->get('cedula'),
                dias_trabajados: (int) $request->get('dias_trabajados'),
                pago_dia: $request->get('pago_dia'),
                pago_total: $request->get('pago_total'),
                pago_mensual: $request->get('pago_mensual'),
                fecha_pago: date('Y-m-d', strtotime($request->get('fecha_pago'))),
                firma: $request->get('firma'),
            );

            $data = CocoaAreaActivitiesRegistry::query()
                ->create([
                    'actividad' => $dto->actividad,
                    'nombre_trabajador' => $dto->nombre_trabajador,
                    'sexo' => $dto->sexo,
                    'cedula' => $dto->cedula,
                    'dias_trabajados' => $dto->dias_trabajados,
                    'pago_dia' => $dto->pago_dia,
                    'pago_total' => $dto->pago_total,
                    'pago_mensual' => $dto->pago_mensual,
                    'fecha_pago' => $dto->fecha_pago,
                    'firma' => $dto->firma,
                    'general_data_id' => $id,
                ]);

            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'data' => $data,
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function index(int $id): JsonResponse
    {
        try {
            GeneralData::query()->findOrFail($id);
            $data = CocoaAreaActivitiesRegistry::query()
                ->where('general_data_id', $id)
                ->get()
                ->toArray();

            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'data' => $data,
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
