<table border="1">
<tr>
    <th>Nombre</th>
    <th>Tipo</th>
    <th>Reacción</th>
</tr>

<?php foreach ($entidades as $e): ?>
<tr style="<?= $e->getNivelEstabilidad() < 3 ? 'background:red;' : '' ?>">
    <td><?= $e->reaccionar() ?></td>
    <td><?= $e->getTipo() ?></td>
    <td><?= $e->reaccionar() ?></td>
</tr>
<?php endforeach; ?>
</table>
