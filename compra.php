<?php 
//incluye la clase Libro y CrudLibro
require_once('./clases/crud_servicio.php');
require_once('servicio.php');
$crud=new crudServicio();
$servicio= new Servicio("","","","  ");
//obtiene todos los libros con el método mostrar de la clase crud
$servicio=$crud->obtenerElemento($_GET["evento"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Servicio</title>
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
</head>
<body>
    <form action="./verificar_Compra.php" method="post">
        <h2>Nombre producto</h2>
        <p name="servicio"><?php echo $servicio->getNombreServicio() ?></p>
        <input type="hidden" id="servicio" name="servicio" value="<?php echo $servicio->getNombreServicio() ?>">
        <h2>Precio</h2>
        <p name="costo"><?php echo $servicio->getCosto() ?></p>
        <input type="hidden" id="costo" name="costo" value="<?php echo $servicio->getCosto() ?>">
        <h2>Horarios</h2>
        <input type="date" name="" id="" min="2018-03-25" max="2018-05-25" step="2">
        <input type="datetime-local" name="fecha" id="fecha" min="2018-06-01T00:00" 
        pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}"
        max="2018-06-30T00:00">
        
        <input type="hidden" id="vendedor" name="vendedor" value="<?php echo $servicio->getNombreDueno() ?>">
        <input class="btn btn-primary" type="submit" value="Verificar" onclick="false;"></input>
    </form>
</body>
</html>