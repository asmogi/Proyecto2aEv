<?php
class MineralRaro extends EntidadEstelar {

    private int $dureza;

    public function __construct(
        string $nombre,
        string $planetaOrigen,
        int $nivelEstabilidad,
        int $dureza,
        ?string $id = null
    ) {
        parent::__construct($nombre, $planetaOrigen, $nivelEstabilidad, $id);

        if ($dureza < 1 || $dureza > 20) {
            throw new InvalidArgumentException("Dureza fuera de rango");
        }

        $this->dureza = $dureza;
    }

    public function reaccionar(): string {
        return "Brilla con intensidad azulada";
    }

    public function getTipo(): string {
        return "Mineral Raro";
    }

    public function getDureza(): int {
        return $this->dureza;
    }
}

