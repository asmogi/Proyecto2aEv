<?php
class Paginador {

    public static function paginar(
        array $datos,
        int $porPagina,
        int $paginaActual
    ): array {
        $total = count($datos);
        $totalPaginas = max(1, ceil($total / $porPagina));
        $paginaActual = max(1, min($paginaActual, $totalPaginas));

        $inicio = ($paginaActual - 1) * $porPagina;

        return [
            'datos' => array_slice($datos, $inicio, $porPagina),
            'paginaActual' => $paginaActual,
            'totalPaginas' => $totalPaginas
        ];
    }
}
