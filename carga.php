<?php
session_start(); 
require('funciones/registrar_solicitud.php');

$mensajerequired= '<p style="background-color:#F0F8FF; padding: 10px;">Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios.</p>'; 

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
    <title>Registro - Vali Admin</title>
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
    <?php require_once ('user.inc.php')?>
    </ul>
    </header>
    <?php require_once ('menu.inc.php')?>
    <!-- fin Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Registra aquí tu solicitud</h1>
          <p>Detalla lo más que puedas para que un encargado pueda asesorarte.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Inicio</li>
          <li class="breadcrumb-item"><a href="#">Registro</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Ingresa los datos solicitados</h3>
            
            <?php echo $mensajeExito; ?>
            <?php echo $mensajeError; ?>
            <?php echo $mensajerequired; ?>
            
            <div class="tile-body">
 
                <form method="post" action="">
                    <div class="form-group">
                        <label class="control-label">Título</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                        <input class="form-control" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Descripción de solicitud <i class="fa fa-asterisk" aria-hidden="true"></i></label>
                        <textarea class="form-control" rows="4" placeholder="Ingresa los detalles..." name="descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tipo de solicitud</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="tipoSolicitud" value="1" required>Desarrollo Nuevas funcionalidades
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="tipoSolicitud" value="2" required>Reporte de error
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="tipoSolicitud" value="3" required>Soporte Técnico
                            </label>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit" name="registrarSolicitud">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i> Registrar
                        </button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="index.php">
                            <i class="fa fa-fw fa-lg fa-times-circle"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
          </div>
        </div>
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