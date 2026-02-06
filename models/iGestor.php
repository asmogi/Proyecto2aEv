<?php
interface iGestor {
    public function obtenerTodos(): array;
    public function obtenerPorId(string $id): ?EntidadEstelar;
    public function guardar(EntidadEstelar $entidad): void;
    public function actualizar(EntidadEstelar $entidad): void;
    public function eliminar(string $id): void;
}
