<?php 

function ValidarDatosSolicitud()
{
    $vMensaje = '';

    $titulo = trim($_POST['titulo']);
    $descripcion = trim($_POST['descripcion']);

    if (strlen($titulo) < 5) {
        $vMensaje .= 'El título debe tener al menos 5 caracteres. <br />';
    }
    if (strlen($descripcion) < 5) {
        $vMensaje .= 'La descripción debe tener al menos 5 caracteres. <br />';
    }

    return $vMensaje;
}

?>
