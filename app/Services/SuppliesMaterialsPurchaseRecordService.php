<?php

namespace App\Services;

use App\DTO\SuppliesMaterialsPurchaseRecord\SuppliesMaterialsPurchaseRecordDTO;
use App\Http\Requests\StoreSuppliesMaterialsPurchaseRecordRequest;
use App\Http\Requests\UpdateSuppliesMaterialsPurchaseRecordRequest;
use App\Models\GeneralData;
use App\Models\SuppliesMaterialsPurchaseRecord;
use Illuminate\Http\JsonResponse;
use Throwable;

class SuppliesMaterialsPurchaseRecordService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = SuppliesMaterialsPurchaseRecord::query()
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

    public function updated(UpdateSuppliesMaterialsPurchaseRecordRequest $request, int $id): JsonResponse
    {
        try {
            $data = SuppliesMaterialsPurchaseRecord::query()
                ->findOrFail($id);

            $result = $data->updateOrFail([
                'nombre_producto' => $request->get('nombre_producto'),
                'cantidad' => $request->get('cantidad'),
                'unidad_medida' => $request->get('unidad_medida'),
                'fecha_compra' => date('Y-m-d', strtotime($request->get('fecha_compra'))),
                'categoria' => $request->get('categoria'),
                'costo_unitario' => $request->get('costo_unitario'),
                'costo_total' => $request->get('costo_total'),
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
            $suppliesMaterialsPurchaseRecord = SuppliesMaterialsPurchaseRecord::query()
                ->where('general_data_id', $generalDataId)
                ->get()
                ->toArray();

            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'data' => $suppliesMaterialsPurchaseRecord,
            ]);
        } catch (Throwable $exception) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function store(StoreSuppliesMaterialsPurchaseRecordRequest $request, int $generalDataId): JsonResponse
    {
        try {
            GeneralData::query()->findOrFail($generalDataId);
            $suppliesMaterialsPurchaseRecordDTO = new SuppliesMaterialsPurchaseRecordDTO(
                nombre_producto: $request->get('nombre_producto'),
                cantidad: $request->get('cantidad'),
                unidad_medida: $request->get('unidad_medida'),
                fecha_compra: date('Y-m-d', strtotime($request->get('fecha_compra'))),
                costo_unitario: $request->get('costo_unitario'),
                costo_total: $request->get('costo_total'),
                categoria: $request->get('categoria'),
            );

            $suppliesMaterialsPurchaseRecord = SuppliesMaterialsPurchaseRecord::query()
                ->create([
                    'nombre_producto' => $suppliesMaterialsPurchaseRecordDTO->nombre_producto,
                    'cantidad' => $suppliesMaterialsPurchaseRecordDTO->cantidad,
                    'unidad_medida' => $suppliesMaterialsPurchaseRecordDTO->unidad_medida,
                    'fecha_compra' => $suppliesMaterialsPurchaseRecordDTO->fecha_compra,
                    'categoria' => $suppliesMaterialsPurchaseRecordDTO->categoria,
                    'costo_unitario' => $suppliesMaterialsPurchaseRecordDTO->costo_unitario,
                    'costo_total' => $suppliesMaterialsPurchaseRecordDTO->costo_total,
                    'general_data_id' => $generalDataId,
                ]);

            return response()->json([
                'status' => true,
                'statusCode' => 201,
                'data' => $suppliesMaterialsPurchaseRecord,
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
