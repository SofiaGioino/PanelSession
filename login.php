<?php
session_start(); 
require_once ('conexion.php');
$MiConexion = ConexionBD();

$mensaje = '<div class="bs-component">
    <div class="alert alert-dismissible alert-info">
        <strong>Ingresa tus datos</strong>
    </div>
</div>';

if (!empty($_POST['botonlogin'])) {
    require_once ('funciones/login.php');
    $UsuarioLogueado = DatosLogin($_POST['email'], ($_POST['clave']), $MiConexion);

    if (!empty($UsuarioLogueado)) {
      
      $_SESSION['Usuario_id'] = $UsuarioLogueado['ID'];
      $_SESSION['nombre'] = $UsuarioLogueado['NOMBRE'];
      $_SESSION['apellido'] = $UsuarioLogueado['APELLIDO'];
      $_SESSION['Usuario_Rol'] = $UsuarioLogueado['ROL'];
      $_SESSION['Usuario_imagen'] = $UsuarioLogueado['IMAGEN'];

      if ($UsuarioLogueado['ACTIVO'] ==0 ) {
        $mensaje= '<div class="bs-component">
        <div class="alert alert-dismissible alert-danger">
            <strong> Usted no se encuentra activo. </strong>
        </div>
    </div>'; 
      } else {
        header('location:index.php');
        exit;
    } 
  }
    else {
        $mensaje = '<div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
                <strong>Datos incorrectos.</strong>
            </div>
        </div>'; 
    } 
  
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->   
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - 2do desempeño</title>  
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Panel de administración</h1>
      </div>
      <div class="login-box ">
      
        <form class="login-form" method="POST" action="" >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INGRESA AL PANEL</h3>
          <?php echo $mensaje; ?>

          <div class="form-group">
            <label class="control-label">Usuario (*)</label>
            <input type="text" class="form-control" name="email"  value="" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">Clave (*)</label>
            <input type="password" name="clave" value="" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidaste la clave ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button  type="submit" name=botonlogin value="ingresar" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
          </div>
        </form>



        <form class="forget-form" method="POST" action="" >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidaste la clave ?</h3>
          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Tu clave será reseteada</strong>
            </div>
          </div>
          <!-- este es el mensaje de error-
          <div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
              <strong>El mail ingresado no existe</strong>
            </div>
          </div>
         --->

          <!-- este es el mensaje de ok!
          <div class="bs-component">
            <div class="alert alert-dismissible alert-success">
              <strong>Listo! Ya puedes loguearte</strong>
            </div>
          </div>
           --------------->
          
          <div class="form-group">
            <label class="control-label">Ingresa tu correo</label>
            <input class="form-control" placeholder="Email">
          </div>
          <div class="form-group btn-container ">
            <button class="btn btn-primary btn-block" type='submit' name='btnResetearClave' value='dadfa'><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Ir al Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>