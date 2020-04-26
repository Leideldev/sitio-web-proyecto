
<?php
//incluye la clase Libro y CrudLibro
require_once('./clases/crud_servicio.php');
require_once('servicio.php');
$crud=new crudServicio();
$servicio= new Servicio("","","","  ");
//obtiene todos los libros con el método mostrar de la clase crud
$servicio=$crud->obtenerElemento($_GET["id"]);
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
</head>
<body>
<div class="container-fluid">

    <!-- Header -->  
    <header>
        <div class="row">
            <div class="col-12 p-4" style="background-color: #0b1023;"></div>
        </div>
        <div class="row">
          <!-- Jumbotron que contiene imagen e input/button, remover el estilo en linea de jumbotron -->  
            <div class="col-12 col-no-padding" ><div class="jumbotron jumbotron-fluid" style="background-image: url(./img/paisaje.jpg);">
                <div class="container">
                  </div>
              </div></div>
        </div>
        </header>


   <div class="container py-3"></div>
<!-- Contenedor de lista-->
    <div class="container py-5">

    <div class="row">
        <!-- Columna grande ajustada derecha izquierda-->
        <div class="col-lg-8 mx-auto">
            <!-- Lista de productos-->
            <ul class="list-group">
                <!-- Elemento de lista-->
                <li class="list-group-item noBorder">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 font-weight-bold mb-2"><?php echo $servicio->getNombreServicio() ?></h5>      
                        </div>   
                    </div>   
                </li>
                <li class="list-group-item noBorder">
                    descripcion
                <p class="font-italic text-muted mb-0 small"><?php echo $servicio->getDescripcion() ?></p>
                </li> 
                <li class="list-group-item noBorder">
                    costo
                    <h6 class="font-weight-bold my-2"><?php echo $servicio->getCosto() ?></h6>
                </li>   
                <li class="list-group-item noBorder">
                    imagenes
                    <img  src="./img/paisaje.jpg" alt="">
                </li> 
                <li class="list-group-item noBorder">
                    Vendedor
                    <a href="http://localhost/sitio-web-proyecto/perfil.php?usuario=<?php echo $servicio->getNombreDueno() ?>">
                    <h6 class="font-weight-bold my-2"><?php echo $servicio->getNombreDueno() ?></h6>
                    </a>
                </li> 
                <!-- Elemento de lista--> 
              </ul>
        </div>
    </div>
    </div>


    </div>
</body>
</html>