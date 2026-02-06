<?php
class FormaDeVida extends EntidadEstelar {

    private string $dieta;

    public function __construct(
        string $nombre,
        string $planetaOrigen,
        int $nivelEstabilidad,
        string $dieta,
        ?string $id = null
    ) {
        parent::__construct($nombre, $planetaOrigen, $nivelEstabilidad, $id);

        if (!in_array($dieta, ['Carbono', 'Silicio', 'Energía'])) {
            throw new InvalidArgumentException("Dieta no válida");
        }

        $this->dieta = $dieta;
    }

    public function reaccionar(): string {
        return "Emite un pulso electromagnético";
    }

    public function getTipo(): string {
        return "Forma de Vida";
    }
}
