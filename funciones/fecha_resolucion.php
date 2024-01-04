<?php

function calcularFechaResolucion($tipoSolicitud)
{
   
    $hoy = strtotime('now');
    switch ($tipoSolicitud) {
        case 1:
            $fechaResolucion = date('Y-m-d H:i:s', strtotime('+1 week', $hoy));
            break;
        case 2: 
            $fechaResolucion = date('Y-m-d H:i:s', strtotime('+1 day', $hoy));
            break;
        case 3: 
            $fechaResolucion = date('Y-m-d H:i:s', strtotime('+3 days', $hoy));
            break;
        default:
            $fechaResolucion = date('Y-m-d H:i:s', $hoy);
    }
    return $fechaResolucion;
}
?>