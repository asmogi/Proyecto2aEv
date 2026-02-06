<?php
require_once 'models/iInteractuable.php';
require_once 'models/iGestor.php';
require_once 'models/entidadestelar.php';
require_once 'models/FormaDeVida.php';
require_once 'models/MineralRaro.php';
require_once 'models/ArtefactoAntiguo.php';

require_once 'helpers/GestorSesion.php';
require_once 'helpers/paginador.php';

require_once 'controllers/ControladorEntidades.php';

session_start();

$gestor = new GestorSesion();
$controlador = new ControladorEntidades($gestor);

$accion = $_GET['accion'] ?? 'listar';

if ($accion === 'guardar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador->crearDesdePost($_POST);
    header('Location: index.php');
    exit;
}

if ($accion === 'actualizar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador->actualizarDesdePost($_POST);
    header('Location: index.php');
    exit;
}

if ($accion === 'crear') {
    $modo = 'crear';
    $entidad = null;
    require 'views/crear.php';
    exit;
}

if ($accion === 'editar') {
    $id = $_GET['id'] ?? null;
    if (!$id) {
        header('Location: index.php');
        exit;
    }
    $entidad = $gestor->obtenerPorId($id);
    if (!$entidad) {
        header('Location: index.php');
        exit;
    }
    $modo = 'editar';
    require 'views/crear.php';
    exit;
}

$pagina = (int)($_GET['pagina'] ?? 1);
$paginacion = $controlador->listar($pagina);

$entidades = $paginacion['datos'];
$paginaActual = $paginacion['paginaActual'];
$totalPaginas = $paginacion['totalPaginas'];

require 'views/listado.php';