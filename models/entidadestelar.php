<?php
abstract class EntidadEstelar implements iInteractuable {

    protected string $id;
    protected string $nombre;
    protected string $planetaOrigen;
    protected int $nivelEstabilidad;

    public function __construct(
        string $nombre,
        string $planetaOrigen,
        int $nivelEstabilidad
    ) {
        $this->id = uniqid();
        $this->nombre = $nombre;
        $this->planetaOrigen = $planetaOrigen;
        $this->nivelEstabilidad = $nivelEstabilidad;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getPlanetaOrigen(): string {
        return $this->planetaOrigen;
    }

    public function getNivelEstabilidad(): int {
        return $this->nivelEstabilidad;
    }
}
