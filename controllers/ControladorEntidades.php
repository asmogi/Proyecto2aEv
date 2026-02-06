<?php
class ControladorEntidades {

    private iGestor $gestor;

    public function __construct(iGestor $gestor) {
        $this->gestor = $gestor;
    }

    public function listar(int $pagina): array {
        $todos = $this->gestor->obtenerTodos();
        return Paginador::paginar($todos, 5, $pagina);
    }

    public function crearDesdePost(array $post): void {
        $entidad = $this->fabricarEntidad($post);
        $this->gestor->guardar($entidad);
    }

    public function actualizarDesdePost(array $post): void {
        $entidad = $this->fabricarEntidad($post, $post['id']);
        $this->gestor->actualizar($entidad);
    }

    private function fabricarEntidad(array $data, ?string $id = null): EntidadEstelar {
        return match ($data['tipoEntidad']) {
            'FormaDeVida' =>
                new FormaDeVida(
                    $data['nombre'],
                    $data['planetaOrigen'],
                    (int)$data['nivelEstabilidad'],
                    $data['dieta'],
                    $id
                ),
            'MineralRaro' =>
                new MineralRaro(
                    $data['nombre'],
                    $data['planetaOrigen'],
                    (int)$data['nivelEstabilidad'],
                    (int)$data['dureza'],
                    $id
                ),
            'ArtefactoAntiguo' =>
                new ArtefactoAntiguo(
                    $data['nombre'],
                    $data['planetaOrigen'],
                    (int)$data['nivelEstabilidad'],
                    (int)$data['antiguedad'],
                    $id
                ),
            default => throw new InvalidArgumentException("Tipo desconocido")
        };
    }
}
