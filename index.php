<?php 
  session_start(); 
  require ('conexion.php');
  $MiConexion=ConexionBD();

  $idRolUsuario = $_SESSION['Usuario_Rol'];
  
 
$sqlUsuario= "SELECT COUNT(*) as total FROM usuario"; 
$sqlDesarrollo = "SELECT COUNT(*) as total FROM solicitud WHERE idTipo = 1";
$sqlSoporteTecnico = "SELECT COUNT(*) as total FROM solicitud WHERE idTipo = 2";
$sqlReportesErrores = "SELECT COUNT(*) as total FROM solicitud WHERE idTipo = 3";

$resultUsuario= $MiConexion->query ($sqlUsuario);
$resultDesarrollo = $MiConexion->query($sqlDesarrollo);
$resultSoporteTecnico = $MiConexion->query($sqlSoporteTecnico);
$resultReportesErrores = $MiConexion->query($sqlReportesErrores);


$totalUsuario= $resultUsuario -> fetch_assoc()['total'];
$totalSolicitudesDesarrollo = $resultDesarrollo->fetch_assoc()['total'];
$totalSolicitudesSoporteTecnico = $resultSoporteTecnico->fetch_assoc()['total'];
$totalReportesErrores = $resultReportesErrores->fetch_assoc()['total'];
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
    <title>Vali Admin - Free Bootstrap 4 Admin Template</title>
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
  <?php  require_once ('user.inc.php')?>
    <!-- Sidebar menu-->
    <?php  require_once ('menu.inc.php')?>
    <!-- fin Sidebar menu-->

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Bienvenidos</h1>
          <p>Este es nuestro panel de <?php
              if ($_SESSION['Usuario_Rol'] == 1) {
                echo 'Administrador';
              } elseif ($_SESSION['Usuario_Rol'] == 2) {
                echo 'Usuario Normal';
              } elseif ($_SESSION['Usuario_Rol'] == 3) {
                echo 'Soporte Técnico';
              } elseif ($_SESSION['Usuario_Rol'] == 4) {
              echo 'Analista';
              }
?>
            Por favor selecciona alguna opción del menú lateral izquierdo</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        </ul>
      </div>

       
      <div class="row">
            <?php if ($idRolUsuario == 1) : ?>
            <div class="col-md-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>Usuarios</h4>
                        <p><b><?php echo $totalUsuario; ?></b></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
            <?php if ($idRolUsuario == 1 || $idRolUsuario == 4) : ?>
            <div class="col-md-3">
                <div class="widget-small info coloured-icon"> <i class="icon fa fa-thumbs-o-up fa-3x"></i>
                    <div class="info">
                        <h4>Solicitudes Desarrollo</h4>
                        <p><b><?php echo $totalSolicitudesDesarrollo; ?></b></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($idRolUsuario == 1 || $idRolUsuario == 3) : ?>
            <div class="col-md-3">
                <div class="widget-small warning coloured-icon">
                    <i class="icon fa fa-files-o fa-3x"></i>
                    <div class="info">
                        <h4>Solicitudes de Soporte Técnico</h4>
                        <p><b><?php echo $totalSolicitudesSoporteTecnico; ?></b></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($idRolUsuario == 1 || $idRolUsuario == 4) : ?>
            <div class="col-md-3">
                <div class="widget-small danger coloured-icon">
                    <i class="icon fa fa-star fa-3x"></i>
                    <div class="info">
                        <h4>Reportes de Errores</h4>
                        <p><b><?php echo $totalReportesErrores; ?></b></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
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