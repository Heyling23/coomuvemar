<?php

namespace App\DTO\SuppliesMaterialsPurchaseRecord;

class SuppliesMaterialsPurchaseRecordDTO
{
    public string $nombre_producto;

    public int $cantidad;

    public string $unidad_medida;

    public string $fecha_compra;

    public float $costo_unitario;

    public string $categoria;

    public float $costo_total;

    public function __construct(
        string $nombre_producto,
        int $cantidad,
        string $unidad_medida,
        string $fecha_compra,
        float $costo_unitario,
        float $costo_total,
        string $categoria
    ) {
        $this->categoria = $categoria;
        $this->nombre_producto = $nombre_producto;
        $this->cantidad = $cantidad;
        $this->unidad_medida = $unidad_medida;
        $this->fecha_compra = $fecha_compra;
        $this->costo_unitario = $costo_unitario;
        $this->costo_total = $costo_total;
    }
}
