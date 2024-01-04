<?php

$MiConexion=ConexionBD(); 

function obtenerTipoSolicitud($idTipo) {
    switch ($idTipo) {
        case 1:
            return 'Desarrollo nueva funcionalidad';
        case 2:
            return 'Soporte técnico';
        case 3:
            return 'Reporte de error';
 
    }
}

function Listar_Solicitud($vconexion) {
    $Listado = array();


    $SQL = "SELECT
    id,
    titulo,
    descripcion,
    CASE
        WHEN idTipo = 1 THEN 'Desarrollo nueva funcionalidad'
        WHEN idTipo = 2 THEN 'Soporte técnico'
        WHEN idTipo = 3 THEN 'Reporte de error'
    END AS 'Tipo',
    fechaCarga,
    idTipo,
    fechaEstimada,
    idUsuario
     FROM solicitud
     ORDER BY fechaCarga ASC;";


    $rs = mysqli_query($vconexion, $SQL);

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {
        $Listado[$i]['ID'] = $data['id'];
        $Listado[$i]['TITULO'] = $data['titulo'];

        if (str_word_count($data['descripcion']) > 20) {
            $palabras = explode(' ', $data['descripcion']);
            $descripcionLimitada = implode(' ', array_slice($palabras, 0, 20));
            $Listado[$i]['DESCRIPCION'] = $descripcionLimitada . '...';
        } else {
            $Listado[$i]['DESCRIPCION'] = $data['descripcion'];
        }

        $Listado[$i]['TIPO'] = obtenerTipoSolicitud($data['idTipo']); 
        $Listado[$i]['REGISTRO'] = $data['fechaCarga'];
        $Listado[$i]['FECHA_ESTIMADA'] = calcularFechaResolucion($data['idTipo']);

     
        $userId = $data['idUsuario'];
        $queryUsuario = "SELECT CONCAT(nombre, ' ', apellido) AS nombreCompleto FROM usuario WHERE id = $userId";
        $resultUsuario = mysqli_query($vconexion, $queryUsuario);

    if ($resultUsuario && $rowUsuario = mysqli_fetch_assoc($resultUsuario)) {
        $Listado[$i]['SOLICITANTE'] = $rowUsuario['nombreCompleto'];
    } 

    $Listado[$i]['SOLICITANTE_ID'] = $userId;
    
        
    
        $i++;
    }


    return $Listado;
}
?>
