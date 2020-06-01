<?php 
require_once('./clases/crud_usuario.php');
require_once('usuario.php');
$crud=new crudUsuario();
session_start();
if(isset($_GET["usuario"]))
{
  $usuario= $crud->obtenerElemento($_GET['usuario']);
}
else if(isset($_SESSION['nombre_usuario'])){
  $usuario= $crud->obtenerElemento($_SESSION['nombre_usuario']);
}else{
  header("Status: 301 Moved Permanently");
  header("Location: http://localhost/sitio-web-proyecto/login.html");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
    <script src="./js/jquery-3.4.1.js"></script>
    <script src="./js/bootstrap.js"></script>
</head>
<body>  
  <!-- Contenedor principal -->  
  <div class="container-fluid">
    <!-- Header -->  
      <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">Principal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Perfil<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="productos.php">Servicios</a>
        </li>
      </ul>
      <span class="navbar-text" id=login>
        <?php
        if(isset($_SESSION['nombre_usuario']))
        {
            echo '<button type="button" class="btn btn-primary" onclick="cerrarSesion();">Cerrar sesión</button>';
        }else{
          echo '<a href="./login.html">Login</a>';
        }
        ?>
        
      </span>
    </div>
  </nav>
        <div class="row">
          <!-- Jumbotron que contiene imagen e input/button, remover el estilo en linea de jumbotron -->  
            <div class="col-12 col-no-padding" ><div class="jumbotron jumbotron-fluid" style="background-image: url(./img/paisaje.jpg);">
               
              </div></div>
        </div>
        </header>
       <!-- Contenedor para contenido/imagenes -->  
<div class="container">
    <div class="row">
        <div class="container">
            <div class="row">
                  <div class="col-xs-12 col-sm-9">
                    
                    <!-- User profile -->
                    <div class="panel panel-default">
                      <div class="panel-heading">
                      <h4 class="panel-title">Perfil de usuario</h4>
                      </div>
                      <div class="panel-body">
                        <div class="profile__avatar">
                          <img src="/img/descarga.png" alt="..." id="img">
                        </div>
                        <div class="profile__header">
                          <h4><?php echo $usuario->getNombre(); ?><small> <?php echo $usuario->getTipo(); ?></small></h4>
                          <p class="text-muted">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non nostrum odio cum repellat veniam eligendi rem cumque magnam autem delectus qui.
                          </p>
                          <p>
                            <input onchange=cambio_archivo() type=file id=input>
                          </p>
                        </div>
                      </div>
                    </div>
            
                    <!-- User info -->
                    <div class="panel panel-default">
                      <div class="panel-heading">
                      <h4 class="panel-title">User info</h4>
                      </div>
                      <div class="panel-body">
                        <table class="table profile__table">
                          <tbody>
                            <tr>
                              <th><strong>Location</strong></th>
                              <td></td>
                            </tr>
                            <tr>
                              <th><strong>Company name</strong></th>
                              <td></td>
                            </tr>
                            <tr>
                              <th><strong>Position</strong></th>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
            
                    <!-- Community -->
                    <div class="panel panel-default">
                      <div class="panel-heading">
                      <h4 class="panel-title">Comunidad</h4>
                      </div>
                      <div class="panel-body">
                        <table class="table profile__table">
                          <tbody>   
                            <tr>
                              <th><strong>Member since</strong></th>
                              <td>Jan 01, 2016</td>
                            </tr>        
                          </tbody>
                        </table>
                      </div>
                    </div>
            
                    <!-- Latest posts -->
                    
            
                  </div>
                  <div class="col-xs-12 col-sm-3">
                    
                    <!-- Contact user -->
                    <p>
                      <a href="#" class="profile__contact-btn btn btn-lg btn-block btn-info" data-toggle="modal" data-target="#profile__contact-form">
                        Contact user
                      </a>
                    </p>
            
                    <hr class="profile__contact-hr">
                    
                    <!-- Contact info -->
                    <div class="profile__contact-info">
                      <div class="profile__contact-info-item">
                        <div class="profile__contact-info-icon">
                          <i class="fa fa-phone"></i>
                        </div>
                        <div class="profile__contact-info-body">
                          <h5 class="profile__contact-info-heading">Work number</h5>
                          (000)987-65-43
                        </div>
                      </div>
                      <div class="profile__contact-info-item">
                        <div class="profile__contact-info-icon">
                          <i class="fa fa-phone"></i>
                        </div>
                        <div class="profile__contact-info-body">
                          <h5 class="profile__contact-info-heading">Mobile number</h5>
                          (000)987-65-43
                        </div>
                      </div>
                      <div class="profile__contact-info-item">
                        <div class="profile__contact-info-icon">
                          <i class="fa fa-envelope-square"></i>
                        </div>
                        <div class="profile__contact-info-body">
                          <h5 class="profile__contact-info-heading">E-mail address</h5>
                          <a href="mailto:admin@domain.com">admin@domain.com</a>
                        </div>
                      </div>
                      <div class="profile__contact-info-item">
                        <div class="profile__contact-info-icon">
                          <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="profile__contact-info-body">
                          <h5 class="profile__contact-info-heading">Work address</h5>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </div>
                      </div>
                    </div>
            
                  </div>
                </div>
            </div>
    </div>
</div>
<div class="container mt-5">

</div>
<!-- Footer -->
<footer class="page-footer font-small blue">
  <div class="footer-copyright text-center py-3">2020 Copyright
  <!-- Contenido footer -->
  </div>
</footer>  
  </div>
  <script src="./js/custom.js"></script>
</body>
</html>