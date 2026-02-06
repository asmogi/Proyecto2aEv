<?php
class ArtefactoAntiguo extends EntidadEstelar {

    private int $antiguedad;

    public function __construct(
        string $nombre,
        string $planetaOrigen,
        int $nivelEstabilidad,
        int $antiguedad,
        ?string $id = null
    ) {
        parent::__construct($nombre, $planetaOrigen, $nivelEstabilidad, $id);

        if ($antiguedad <= 0) {
            throw new InvalidArgumentException("Antigüedad inválida");
        }

        $this->antiguedad = $antiguedad;
    }

    public function reaccionar(): string {
        return "Reproduce un mensaje en una lengua muerta";
    }

    public function getTipo(): string {
        return "Artefacto Antiguo";
    }
}
