<?php
function mostrarSolicitud($solicitud, $claseEstilo)
{
    ?>
    <tr class="<?php echo $claseEstilo; ?>">
        <td><?php echo $solicitud['ID']; ?></td>
        <td><?php echo $solicitud['TITULO']; ?></td>
        <td><?php echo $solicitud['DESCRIPCION']; ?></td>
        <td><?php echo $solicitud['TIPO']; ?></td>
        <td><?php echo date('d/m/Y H:i:s', strtotime($solicitud['REGISTRO'])); ?></td>
        <td><?php echo date('d/m/Y H:i:s', strtotime($solicitud['FECHA_ESTIMADA'])); ?></td>
        <td><?php echo $solicitud['SOLICITANTE']; ?></td>
        <td>
            <a href="#">Ver detalles...</a>
            <a href="#"><i class="app-menu__icon fa fa-cog"></i>Eliminar...</a>
        </td>
    </tr>
<?php
}
?>
