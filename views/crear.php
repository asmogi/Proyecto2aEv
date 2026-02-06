<?php

$modo ??= 'crear';
$entidad ??= null;

$tipoSeleccionado = $entidad ? $entidad->getTipo() : '';
?>

<h2>
    <?= $modo === 'crear'
        ? '📡 Registrar Nuevo Hallazgo'
        : '🛠 Modificar Hallazgo Existente'
    ?>
</h2>

<form method="POST" action="<?= $accionFormulario ?>" id="formHallazgo">


    <?php if ($modo === 'editar'): ?>
        <input type="hidden" name="id" value="<?= $entidad->getId() ?>">
    <?php endif; ?>

    <fieldset>
        <legend>🌠 Datos Generales</legend>

        <label>
            Nombre del Hallazgo:
            <input
                type="text"
                name="nombre"
                required
                minlength="3"
                value="<?= $entidad->nombre ?? '' ?>"
            >
        </label>

        <br><br>

        <label>
            Planeta de Origen:
            <input
                type="text"
                name="planetaOrigen"
                required
                value="<?= $entidad->planetaOrigen ?? '' ?>"
            >
        </label>

        <br><br>

        <label>
            Nivel de Estabilidad (1–10):
            <input
                type="number"
                name="nivelEstabilidad"
                min="1"
                max="10"
                required
                value="<?= $entidad->getNivelEstabilidad() ?? 5 ?>"
            >
        </label>
    </fieldset>

    <br>


    <fieldset>
        <legend>🧬 Tipo de Entidad</legend>

        <select name="tipoEntidad" id="tipoEntidad" required>
            <option value="">-- Selecciona --</option>
            <option value="FormaDeVida" <?= $tipoSeleccionado === 'Forma de Vida' ? 'selected' : '' ?>>
                Forma de Vida
            </option>
            <option value="MineralRaro" <?= $tipoSeleccionado === 'Mineral Raro' ? 'selected' : '' ?>>
                Mineral Raro
            </option>
            <option value="ArtefactoAntiguo" <?= $tipoSeleccionado === 'Artefacto Antiguo' ? 'selected' : '' ?>>
                Artefacto Antiguo
            </option>
        </select>
    </fieldset>

    <br>


    <fieldset id="camposFormaDeVida" class="campos-especificos">
        <legend>🧠 Forma de Vida</legend>

        <label>
            Dieta:
            <select name="dieta">
                <option value="">-- Selecciona --</option>
                <option value="Carbono">Carbono</option>
                <option value="Silicio">Silicio</option>
                <option value="Energía">Energía</option>
            </select>
        </label>
    </fieldset>

    <fieldset id="camposMineral" class="campos-especificos">
        <legend>💎 Mineral Raro</legend>

        <label>
            Dureza (Escala Mohs Galáctica):
            <input type="number" name="dureza" min="1" max="20">
        </label>
    </fieldset>

    <fieldset id="camposArtefacto" class="campos-especificos">
        <legend>🏺 Artefacto Antiguo</legend>

        <label>
            Antigüedad (en años luz):
            <input type="number" name="antiguedad" min="1">
        </label>
    </fieldset>

    <br>


    <button type="submit">
        <?= $modo === 'crear' ? '🚀 Registrar Hallazgo' : '💾 Guardar Cambios' ?>
    </button>

    <a href="index.php">Cancelar</a>

</form>

<style>
fieldset {
    border: 1px solid #888;
    padding: 10px;
    margin-bottom: 10px;
}

.campos-especificos {
    display: none;
    background: #f4f4f4;
}
</style>


<script>
const selector = document.getElementById('tipoEntidad');
const secciones = {
    FormaDeVida: document.getElementById('camposFormaDeVida'),
    MineralRaro: document.getElementById('camposMineral'),
    ArtefactoAntiguo: document.getElementById('camposArtefacto')
};

function ocultarTodo() {
    Object.values(secciones).forEach(sec => sec.style.display = 'none');
}

selector.addEventListener('change', () => {
    ocultarTodo();
    if (secciones[selector.value]) {
        secciones[selector.value].style.display = 'block';
    }
});

if (selector.value !== '') {
    ocultarTodo();
    secciones[selector.value].style.display = 'block';
}
</script>
