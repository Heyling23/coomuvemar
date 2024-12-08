<?php

namespace App\Services;

use App\DTO\HarvestRegistrationCocoa\HarvestRegistrationCocoaDTO;
use App\Http\Requests\StoreHarvestRegistrationCocoaRequest;
use App\Http\Requests\UpdateHarvestRegistrationCocoaRequest;
use App\Models\GeneralData;
use App\Models\HarvestRegistrationCocoa;
use Illuminate\Http\JsonResponse;
use Throwable;

class HarvestRegistrationCocoaService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = HarvestRegistrationCocoa::query()
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
    public function update(UpdateHarvestRegistrationCocoaRequest $request, int $id): JsonResponse
    {
        try {
            $result = HarvestRegistrationCocoa::query()
                ->findOrFail($id)
                ->updateOrFail([
                    'fecha' => date('Y-m-d', strtotime($request->get('fecha'))),
                    'cantidad_mazorcas' => $request->get('cantidad_mazorcas'),
                    'precio_qq' => $request->get('precio_qq'),
                    'qq_baba_cacao' => $request->get('qq_baba_cacao'),
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
            $harvestRegistrationCocoa = HarvestRegistrationCocoa::query()
                ->where('general_data_id', $generalDataId)
                ->get()
                ->toArray();

            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'data' => $harvestRegistrationCocoa,
            ]);
        } catch (Throwable $exception) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function store(StoreHarvestRegistrationCocoaRequest $request, int $generalDataId): JsonResponse
    {
        try {
            GeneralData::query()
                ->findOrFail($generalDataId);

            $harvestRegistrationCocoaDTO = new HarvestRegistrationCocoaDTO(
                fecha: date('Y-m-d', strtotime($request->get('fecha'))),
                cantidad_mazorcas: $request->get('cantidad_mazorcas'),
                precio_qq: $request->get('precio_qq'),
                qq_baba_cacao: $request->get('qq_baba_cacao'),
            );

            $harvestRegistrationCocoa = HarvestRegistrationCocoa::query()
                ->create([
                    'general_data_id' => $generalDataId,
                    'fecha' => $harvestRegistrationCocoaDTO->fecha,
                    'cantidad_mazorcas' => $harvestRegistrationCocoaDTO->cantidad_mazorcas,
                    'precio_qq' => $harvestRegistrationCocoaDTO->precio_qq,
                    'qq_baba_cacao' => $harvestRegistrationCocoaDTO->qq_baba_cacao,
                ]);

            return response()->json([
                'status' => true,
                'statusCode' => 201,
                'data' => $harvestRegistrationCocoa,
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
