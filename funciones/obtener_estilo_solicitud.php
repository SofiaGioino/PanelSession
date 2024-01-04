<?php function obtenerClaseEstilo($tipoSolicitud) {
    switch ($tipoSolicitud) {
       case 'Desarrollo nueva funcionalidad':
          return 'table-info';
       case 'Soporte técnico':
          return 'table-danger';
       case 'Reporte de error':
         return 'table-warning';
        }
}

?>