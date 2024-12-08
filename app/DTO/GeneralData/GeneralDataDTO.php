<?php

namespace App\DTO\GeneralData;

class GeneralDataDTO
{
    public string $nombre_productor;

    public string $codigo;

    public string $numero_cedula;

    public string $nombre_finca;

    public string $altura_nivel_mar;

    public string $ciclo_productivo;

    public string $coordenadas_area_cacao;

    public string $departamento;

    public string $municipio;

    public string $comunidad;

    public string $area_total_finca;

    public string $area_cacao;
    public bool $es_certificado;

    public string $produccion;

    public string $desarrollo;

    public string $variedades_cacao;
    public string $bosquejo_finca;

    public function __construct(
        string $nombre_productor,
        string $codigo,
        string $numero_cedula,
        string $nombre_finca,
        float $altura_nivel_mar,
        string $ciclo_productivo,
        string $coordenadas_area_cacao,
        string $departamento,
        string $municipio,
        string $comunidad,
        float $area_total_finca,
        float $area_cacao,
        float $produccion,
        float $desarrollo,
        string $variedades_cacao,
        bool $es_certificado,
        string $bosquejo_finca
    ) {
        $this->nombre_productor = $nombre_productor;
        $this->codigo = $codigo;
        $this->numero_cedula = $numero_cedula;
        $this->nombre_finca = $nombre_finca;
        $this->altura_nivel_mar = $altura_nivel_mar;
        $this->ciclo_productivo = $ciclo_productivo;
        $this->coordenadas_area_cacao = $coordenadas_area_cacao;
        $this->departamento = $departamento;
        $this->municipio = $municipio;
        $this->comunidad = $comunidad;
        $this->area_total_finca = $area_total_finca;
        $this->area_cacao = $area_cacao;
        $this->produccion = $produccion;
        $this->desarrollo = $desarrollo;
        $this->variedades_cacao = $variedades_cacao;
        $this->es_certificado = $es_certificado;
        $this->bosquejo_finca = $bosquejo_finca;
    }
}
