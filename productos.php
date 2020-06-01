<?php

session_start();
if(!isset($_SESSION['nombre_usuario']))
{
  header('location: http://localhost/perfil.php', true, 307);
}
//incluye la clase Libro y CrudLibro
require_once('./clases/crud_servicio.php');
require_once('servicio.php');
$crud=new crudServicio();
$servicio= new Servicio("","","","  ");
//obtiene todos los libros con el método mostrar de la clase crud
$listaServicios=$crud->obtenerLista();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Eventos turisticos de ahome ">
    <title>Servicio turisticos en Ahome</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
    <script src="./js/jquery-3.4.1.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script>
        function ActualizarLista()
        {
            $.ajax({
                    //Tipo de envio
                    type: "POSt",
                    //URL destino
                    url: "./controlador/controlador_servicio.php",
                    //Datos a enviar
                    data: {mandar:"consultar"},  // Se forma la cadena getusuario.php?q=2

                    //Procesa Dato recibido
                    success: function (data) {
                        //Coloca el resultado en la pagina WEB
                        $(".list-group").html(data);
                    },

                    //Procesa mensaje de error
                    error: function (e) {
                        //Coloca un mensaje en la pagina WEB
                        $("#result").text("error:"+e.status+"error:"+e.statusText);
                    }
                });
        }
    </script>
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <style media="screen">
      .mid{
        border-top: 0;
        border-bottom: 0;
        border-left: 2px;
        border-right: 2px;
        border-style: groove;
        border-color: #c9c9c9;

      }
      .mid ul li{
        border-bottom: 2px;
        border-style: dashed;
        border-color: #c9c9c9;
      }
      h2{
        margin: auto;
        margin-bottom: 30px;
      }
      h6{
        color: red;
      }
    </style>
</head>
<body>
<div class="container-fluid">

    <!-- Header -->
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Principal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
      <?php
     if(($_SESSION['tipo'])=='publicista')
     {
       echo '
       <li class="nav-item active">
         <a class="nav-link" href="perfil.php">Perfil<span class="sr-only"></span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="insertarServicio.php">Registrar servicio</a>
       </li>
     ';
     }else{
      echo '
      <li class="nav-item active">
        <a class="nav-link" href="perfil.php">Perfil<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="productos.php">Servicios</a>
      </li>
    ';
     }
        ?>
      </ul>
      <span class="navbar-text">
      <button type="button" class="btn btn-primary" onclick="cerrarSesion();">Cerrar sesión</button>
      </span>
    </div>
  </nav>
        <div class="row">
          <!-- Jumbotron que contiene imagen e input/button, remover el estilo en linea de jumbotron -->
            <div class="col-12 col-no-padding" ><div class="jumbotron jumbotron-fluid" style="background-image: url(./img/paisaje.jpg);">
                <div class="container">
                  <!-- Inputs y button en un grupo
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Product name...">
                        <select class="custom-select" id="inputGroupSelect04">
                          <option selected>Choose...</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary btn-color" type="button">Button</button>
                        </div>
                      </div>
                    -->
                  </div>
              </div></div>
        </div>
        </header>


  <!-- <div class="container py-3"></div>-->
<!-- Contenedor de lista-->
    <div class="container py-2">

    <div class="row">
             <h2>Elige un Servicio ahora mismo</h2>
        <!-- Columna grande ajustada derecha izquierda-->
        <div class="col-lg-8 mx-auto mid">
            <!-- Lista de productos-->
            <ul class="list-group">
                <!-- Elemento de lista-->
                <?php foreach ($listaServicios as $servicio) {?>
                <li class="list-group-item noBorder">
                    <div class="media">
                        <div class="media-body">
                    <a href='detalles.php?id=<?php echo $servicio->getId() ?>'><h5 class="mt-0 font-weight-bold mb-2"><?php echo $servicio->getNombreServicio() ?></h5></a>

                            <p class="font-italic text-muted mb-0 small"><?php echo $servicio->getDescripcion() ?></p>
                            <h6 class="font-weight-bold my-2">$ <?php echo $servicio->getCosto() ?></h6>
                        </div>

                        <img  title="Evento turistico en Ahome" alt="Turismo en Ahome" onclick="location.href ='http://localhost/sitio-web-proyecto/detalles.php?id=<?php echo $servicio->getId() ?>';" src="./img/paisaje.jpg" alt="">
                    </div>
                </li>
                <?php }?>
                <li class="list-group-item noBorder">
                    <div class="media">
                        <div class="media-body">
                        </div>
                        <button onclick="ActualizarLista();return false;">actualizar</button>
                    </div>
                </li>
                <!-- Elemento de lista-->
              </ul>
        </div>
    </div>
    </div>

    <!-- Elemento dejar un comentario -->
    <div class="container">
        <div class="row">
            <!-- Columna grande ajustada derecha izquierda-->
            <div class="col-lg-8 mx-auto">
                <div class="card card-no-border">
                    <div class="card-header card-header-style mb-5"><div class="media">
                        <img src="./img/descarga.png" alt="" class="img-circle comment-img mr-3">
                           <div class="media-body">
                               <input class="form-control form-control-sm" type="text" placeholder="Add a comment..">
                               <div class="row ">
                                <div class="col-6 d-flex flex-row justify-content-start align-self-center">
                                    <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                </div>
                                <div class="col-6 d-flex flex-row justify-content-end align-self-center mt-1">
                                    <button type="button" class="btn btn-secondary btn-sm">Comment</button></div></div>
                           </div>
                       </div> </div>
                    <div class="card-body">
                        <div class="media">
                         <img src="./img/descarga.png" alt="" class="img-circle comment-img mr-3">
                            <div class="media-body">
                                <div class="row "><div class="col-6">
                                    <h5 class="card-title small font-weight-bold">Username 4h ago </h5>
                                </div>
                                <div class="col-6 d-flex flex-row justify-content-end align-self-center">
                                    <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                </div></div>

                                <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit fuga autem maiores necessitatibus.</p>
                                <hr>
                            </div>
                        </div>
                        <div class="media">
                            <img src="./img/descarga.png" alt="" class="img-circle comment-img mr-3">
                               <div class="media-body">
                                <div class="row "><div class="col-6">
                                    <h5 class="card-title small font-weight-bold">Username 4h ago </h5>
                                </div>
                                <div class="col-6 d-flex flex-row justify-content-end align-self-center">
                                    <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                </div></div>
                                   <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit fuga autem maiores necessitatibus.</p>
                                   <hr>
                               </div>
                           </div>
                           <div class="media">
                            <img src="./img/descarga.png" alt="" class="img-circle comment-img mr-3">
                               <div class="media-body">
                                <div class="row "><div class="col-6">
                                    <h5 class="card-title small font-weight-bold">Username 4h ago </h5>
                                </div>
                                <div class="col-6 d-flex flex-row justify-content-end align-self-center">
                                    <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                </div></div>
                                   <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit fuga autem maiores necessitatibus.</p>
                                   <hr>
                               </div>
                           </div>
                    </div>
                </div>
            </div>
        </div>
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
