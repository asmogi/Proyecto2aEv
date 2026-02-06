<?php
class GestorSesion implements iGestor {

    public function __construct() {
        if (!isset($_SESSION['hallazgos'])) {
            $_SESSION['hallazgos'] = [];
        }
    }

    public function obtenerTodos(): array {
        return array_values($_SESSION['hallazgos']);
    }

    public function obtenerPorId(string $id): ?EntidadEstelar {
        return $_SESSION['hallazgos'][$id] ?? null;
    }

    public function guardar(EntidadEstelar $entidad): void {
        $_SESSION['hallazgos'][$entidad->getId()] = $entidad;
    }

    public function actualizar(EntidadEstelar $entidad): void {
        if (!isset($_SESSION['hallazgos'][$entidad->getId()])) {
            throw new RuntimeException("Entidad no encontrada");
        }
        $_SESSION['hallazgos'][$entidad->getId()] = $entidad;
    }

    public function eliminar(string $id): void {
        unset($_SESSION['hallazgos'][$id]);
    }
}
