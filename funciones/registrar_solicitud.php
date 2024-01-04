<?php

require_once('funciones/validacion_registro.php');


function InsertarSolicitud($vconexion)
{
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $tipoSolicitud = $_POST['tipoSolicitud'];

  
    $idUsuario = $_SESSION['Usuario_id'];

    $SQL_Insert = "INSERT INTO solicitud (titulo, descripcion, idUsuario, fechaCarga, idTipo)
                   VALUES ('$titulo', '$descripcion', $idUsuario, NOW(), $tipoSolicitud)";

    if (!mysqli_query($vconexion, $SQL_Insert)) {
       
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}

$mensajeExito = '';
$mensajeError = '';

if (isset($_POST['registrarSolicitud'])) {
    $errores = ValidarDatosSolicitud();

    if (empty($errores)) {
        
        require_once('conexion.php');
        $conexion = ConexionBD();

        if ($conexion) {
            if (InsertarSolicitud($conexion)) {
                $mensajeExito = '<div class="bs-component">
                                    <div class="alert alert-dismissible alert-success">
                                        <strong>Solicitud almacenada!</strong>
                                    </div>
                                </div>';
            }
        } else {
            $mensajeError = '<div class="bs-component">
                                <div class="alert alert-dismissible alert-danger">
                                    <strong>No se pudo establecer la conexión.</strong>
                                </div>
                            </div>';
        }
    } else {
        $mensajeError = '<div class="bs-component">
                            <div class="alert alert-dismissible alert-danger">
                                <strong>' . $errores . '</strong>
                            </div>
                        </div>';
    }
}

?>

