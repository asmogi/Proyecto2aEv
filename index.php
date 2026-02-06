<?php
session_start();

require_once 'models/iInteractuable.php';
require_once 'models/iGestor.php';
require_once 'models/entidadestelar.php';
require_once 'models/FormaDeVida.php';
require_once 'models/MineralRaro.php';
require_once 'models/ArtefactoAntiguo.php';

require_once 'helpers/GestorSesion.php';
require_once 'helpers/paginador.php';

require_once 'controllers/ControladorEntidades.php';

$gestor = new GestorSesion();
$controlador = new ControladorEntidades($gestor);

$accion = $_GET['accion'] ?? 'listar';

if ($accion === 'guardar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controlador->crearDesdePost($_POST);
    header('Location: index.php');
    exit;
}

$pagina = (int)($_GET['pagina'] ?? 1);
$paginacion = $controlador->listar($pagina);

$entidades = $paginacion['datos'];
$paginaActual = $paginacion['paginaActual'];
$totalPaginas = $paginacion['totalPaginas'];

require 'views/lista.php';
