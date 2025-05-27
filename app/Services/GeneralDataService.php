<?php

namespace App\Services;

use App\DTO\GeneralData\GeneralDataDTO;
use App\Http\Requests\StoreGeneralDataRequest;
use App\Http\Requests\UpdateGeneralDataRequest;
use App\Models\GeneralData;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Throwable;

class GeneralDataService
{
    public function delete(int $id): JsonResponse
    {
        try {
            $result = GeneralData::query()
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

    public function updated(UpdateGeneralDataRequest $request, int $id): JsonResponse
    {
        try {
            $result = GeneralData::query()
                ->findOrFail($id)->updateOrFail([
                    'nombre_productor' => $request->get('nombre_productor'),
                    'codigo' => $request->get('codigo'),
                    'numero_cedula' => $request->get('numero_cedula'),
                    'nombre_finca' => $request->get('nombre_finca'),
                    'altura_nivel_mar' => $request->get('altura_nivel_mar'),
                    'ciclo_productivo' => $request->get('ciclo_productivo'),
                    'coordenadas_area_cacao' => $request->get('coordenadas_area_cacao'),
                    'departamento' => $request->get('departamento'),
                    'municipio' => $request->get('municipio'),
                    'comunidad' => $request->get('comunidad'),
                    'area_total_finca' => $request->get('area_total_finca'),
                    'area_cacao' => $request->get('area_cacao'),
                    'produccion' => $request->get('produccion'),
                    'bosquejo_finca' => 'storage/'.$request->get('bosquejo_finca'),
                    'desarrollo' => $request->get('desarrollo'),
                    'variedades_cacao' => $request->get('variedades_cacao'),
                    'es_certificado' => $request->get('es_certificado'),
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

    public function index(int $userId): JsonResponse
    {
        try {
            $user = User::query()
                ->findOrFail($userId)
                ->get()[0];

            if ($user->rol == "Administrador") {
                $generalDataByUser = GeneralData::query()
                    ->get()
                    ->toArray();
            } else {
                $generalDataByUser = GeneralData::query()
                    ->where('user_id', '=', $userId)
                    ->get()
                    ->toArray();
            }

            for ($i = 0; $i < count($generalDataByUser); $i++) {
                $generalDataByUser[$i]['bosquejo_finca'] = 'http://127.0.0.1:8000/'.$generalDataByUser[$i]['bosquejo_finca'];
            }

            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'data' => $generalDataByUser,
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(StoreGeneralDataRequest $request, int $userId): JsonResponse
    {
        try {
            $generalDataDTO = new GeneralDataDTO(
                nombre_productor: $request->get('nombre_productor'),
                codigo: $request->get('codigo'),
                numero_cedula: $request->get('numero_cedula'),
                nombre_finca: $request->get('nombre_finca'),
                altura_nivel_mar: $request->get('altura_nivel_mar'),
                ciclo_productivo: $request->get('ciclo_productivo'),
                coordenadas_area_cacao: $request->get('coordenadas_area_cacao'),
                departamento: $request->get('departamento'),
                municipio: $request->get('municipio'),
                comunidad: $request->get('comunidad'),
                area_total_finca: $request->get('area_total_finca'),
                area_cacao: $request->get('area_cacao'),
                produccion: $request->get('produccion'),
                desarrollo: $request->get('desarrollo'),
                variedades_cacao: $request->get('variedades_cacao'),
                es_certificado: $request->get('es_certificado'),
                bosquejo_finca: 'storage/'.$request->get('bosquejo_finca'),
            );

            $generalData = GeneralData::query()
                ->create([
                    'nombre_productor' => $generalDataDTO->nombre_productor,
                    'codigo' => $generalDataDTO->codigo,
                    'numero_cedula' => $generalDataDTO->numero_cedula,
                    'nombre_finca' => $generalDataDTO->nombre_finca,
                    'altura_nivel_mar' => $generalDataDTO->altura_nivel_mar,
                    'ciclo_productivo' => $generalDataDTO->ciclo_productivo,
                    'coordenadas_area_cacao' => $generalDataDTO->coordenadas_area_cacao,
                    'departamento' => $generalDataDTO->departamento,
                    'municipio' => $generalDataDTO->municipio,
                    'comunidad' => $generalDataDTO->comunidad,
                    'area_total_finca' => $generalDataDTO->area_total_finca,
                    'area_cacao' => $generalDataDTO->area_cacao,
                    'es_certificado' => $generalDataDTO->es_certificado,
                    'produccion' => $generalDataDTO->produccion,
                    'desarrollo' => $generalDataDTO->desarrollo,
                    'variedades_cacao' => $generalDataDTO->variedades_cacao,
                    'bosquejo_finca' => $generalDataDTO->bosquejo_finca,
                    'user_id' => $userId,
                ]);

            return response()->json([
                'status' => true,
                'statusCode' => 201,
                'data' => $generalData,
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
