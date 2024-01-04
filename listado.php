<?php 

session_start(); 
require('conexion.php');
$MiConexion=ConexionBD(); 

require('funciones/select_solicitud.php');
require('funciones/fecha_resolucion.php');
require ('funciones/solicitud_rol.php');
require('funciones/obtener_estilo_solicitud.php');


$Listado = Listar_Solicitud($MiConexion);


$rolUsuario = $_SESSION['Usuario_Rol']; 

if ($rolUsuario == '1') {
    $tituloListado = 'Listado total de solicitudes';
} elseif ($rolUsuario == '2') {
    $tituloListado = 'Listado de mis solicitudes cargadas';
} elseif ($rolUsuario == '3' || $rolUsuario == '4') {
    $tituloListado = 'Listado de solicitudes cargadas';
};


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->   
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Listado - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php require_once ('header.inc.php')?> 
        <!-- User Menu-->
        <?php  require_once ('user.inc.php')?>
      </ul>
    </header>
    <?php  require_once ('menu.inc.php')?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Listados</h1>
          <!-- si es administrador vera este titulo-->
          <p>Listado total de solicitudes</p>
          
          <!-- si es usuario normal vera este titulo-
          <p>Listado de mis solicitudes cargadas</p> -->

          <!-- si es analista o tecnico vera este titulo
          <p>Listado de solicitudes cargadas</p> -->


        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Listado</li>
          <li class="breadcrumb-item active"><a href="#">Listado de Solicitudes</a></li>
        </ul>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title"><?php echo $tituloListado; ?></h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Registro</th>
                    <th>Fecha estimada</th>
                    <th>Solicitante</th>
                    <th>Opciones</th>

                  </tr>
                </thead>
                <tbody>

    <tr class="table-info">
 
    <?php 
for ($i = 0; $i < count($Listado); $i++) {
    $claseEstilo = obtenerClaseEstilo($Listado[$i]['TIPO']);

    if ($_SESSION['Usuario_Rol'] == 1) {
        mostrarSolicitud($Listado[$i], $claseEstilo);
    } elseif ($_SESSION['Usuario_Rol'] == 2 && $_SESSION['Usuario_id'] == $Listado[$i]['SOLICITANTE_ID'] ) {
        mostrarSolicitud($Listado[$i], $claseEstilo);
    } elseif ($_SESSION['Usuario_Rol'] == 3 && $Listado[$i]['TIPO'] == 'Soporte técnico') {
        mostrarSolicitud($Listado[$i], $claseEstilo);
    } elseif ($_SESSION['Usuario_Rol'] == 4 && $Listado[$i]['TIPO'] != 'Soporte técnico') {
        mostrarSolicitud($Listado[$i], $claseEstilo);
    }
}
?>

    </tr>
  </tbody>

              </table>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    
  </body>
</html>