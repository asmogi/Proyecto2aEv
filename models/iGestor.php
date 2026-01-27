<?php
interface iGestor {
    public function obtenerTodos(): array;
    public function guardar(EntidadEstelar $entidad): void;
    public function eliminar(string $id): void;
}
