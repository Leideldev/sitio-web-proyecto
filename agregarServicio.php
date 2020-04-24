<?php 
    $nombreSer = $_GET['nameSercive'];
    $descripServicio = $_GET['descrip'];
    $costoServ = $_GET['costos'];
    $vendedor = $_GET['vendedor'];

    $conn = new mysqli("localhost", "root", "", "pruebaservicio");
    if ($conn->connect_error) die("Fatal Error");

    //$hash = password_hash($password, PASSWORD_DEFAULT);

    //Agregar_usuario($conn, $nombreSer, $descripServicio,$costoServ,$vendedor);
    try {
        Agregar_servicio($conn, $nombreSer, $descripServicio,$costoServ,$vendedor);
        /* Todo fue OK si llegamos a esta línea */
      } catch (Exception $e) {
        /* Podemos finalizar la ejecución con un mensaje o mostrar HTML con él */
        die('Error modificando producto: ' .  $e->getMessage());
      }

    function Agregar_servicio($conn, $nombreSer, $descripServicio,$costoServ,$vendedor){
       
        $id = 0;
        //Crea el string SQL de insertar        
        $stmt = $conn->prepare('INSERT INTO servicios VALUES(?,?,?,?,?)');
    
        $stmt->bind_param('issis',$id, $nombreSer, $descripServicio,$costoServ,$vendedor);

        // Realiza la instruccion SQL de Insert
        $stmt->execute();

        // Cierra SQL
        $stmt->close();
        echo "<span style='font-weight:bold;color:green;'>Servicio registrado<span>";
    }
?>