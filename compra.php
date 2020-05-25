<?php 
//incluye la clase Libro y CrudLibro
require_once('./clases/crud_servicio.php');
require_once('./clases/crud_horarios.php');
require_once('servicio.php');
require_once('horario.php');
$crud=new crudServicio();
$crud_horario = new crudHorario();
$servicio= new Servicio("","",""," ");
$horario = new Horario("","","","","");
//obtiene todos los libros con el método mostrar de la clase crud
$servicio=$crud->obtenerElemento($_GET["evento"]);
$horario=$crud_horario->obtenerElemento($_GET["evento"]);
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
        function RealizarCompra()
        {
            $.ajax({
                    //Tipo de envio
                    type: "POST",
                    //URL destino
                    url: "./controlador/controlador_reservaciones.php",
                    //Datos a enviar
                    data: $("#formularioCompra").serialize(),  
                    
                    //Procesa Dato recibido
                    success: function (data) {
                        //Coloca el resultado en la pagina WEB
                        $("#result").html(data);;
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
    <form id="formularioCompra" action="./verificar_Compra.php" method="POST">
        <h2>Nombre producto</h2>
        <p name="servicio"><?php echo $servicio->getNombreServicio() ?></p>
        <input type="hidden" id="servicio" name="servicio" value="<?php echo $servicio->getNombreServicio() ?>">
        <h2>Precio</h2>
        <p name="costo"><?php echo $servicio->getCosto() ?></p>
        <input type="hidden" id="costo" name="costo" value="<?php echo $servicio->getCosto() ?>">
        <h2>capacidad por evento: <?php echo $horario->getcapacidad() ?></h2>
        <input type="number" name="cupos" id="cupos" max="<?php echo $horario->getcapacidad() ?>">
        <h2>Horarios: <?php echo $horario->getDias() ?></h2>
        <h2>Desde: <?php echo $horario->getDe() ?></h2>
        <h2>Hasta: <?php echo $horario->getpara() ?></h2>
       
        <input type="date" name="dia" id="dia" min="2020-01-01" max="2020-12-31" >
        <input type="time" name="hora" id="hora" min="<?php echo $horario->getDe() ?>" max="<?php echo $horario->getpara() ?>">
        
        <input class="btn btn-primary" type="submit" value="Verificar" onclick="RealizarCompra();return false;"></input>
        <input type="hidden" id="mandar" name="mandar" value="compra">
        <input type="hidden" id="id_servicio" name="id_servicio" value="<?php echo $servicio->getId() ?>">
        <input type="hidden" id="nombre_vendedor" name="nombre_vendedor" value="<?php echo $servicio->getNombreDueno() ?>">
    </form>
    <div id="result"></div>
</body>
</html>