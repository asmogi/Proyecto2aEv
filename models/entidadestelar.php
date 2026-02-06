<?php
abstract class EntidadEstelar implements iInteractuable {

    protected string $id;
    protected string $nombre;
    protected string $planetaOrigen;
    protected int $nivelEstabilidad;

    public function __construct(
        string $nombre,
        string $planetaOrigen,
        int $nivelEstabilidad,
        ?string $id = null
    ) {
        $this->validarBase($nombre, $planetaOrigen, $nivelEstabilidad);

        $this->id = $id ?? uniqid('nova_', true);
        $this->nombre = $nombre;
        $this->planetaOrigen = $planetaOrigen;
        $this->nivelEstabilidad = $nivelEstabilidad;
    }

    protected function validarBase(
        string $nombre,
        string $planetaOrigen,
        int $nivelEstabilidad
    ): void {
        if (strlen($nombre) < 3) {
            throw new InvalidArgumentException("Nombre demasiado corto");
        }

        if ($nivelEstabilidad < 1 || $nivelEstabilidad > 10) {
            throw new InvalidArgumentException("Nivel de estabilidad inválido");
        }
    }

    public function getId(): string {
        return $this->id;
    }

    public function getNivelEstabilidad(): int {
        return $this->nivelEstabilidad;
    }

    public function esInestable(): bool {
        return $this->nivelEstabilidad < 3;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'planetaOrigen' => $this->planetaOrigen,
            'nivelEstabilidad' => $this->nivelEstabilidad,
            'tipo' => $this->getTipo()
        ];
    }

    abstract public function getTipo(): string;
}
