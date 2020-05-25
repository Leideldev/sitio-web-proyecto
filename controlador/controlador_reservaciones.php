<?php

require_once('../clases/crud_servicio.php');
require_once('../clases/crud_usuario.php');
require_once('../clases/crud_horarios.php');
require_once('../clases/crud_reservaciones.php');
require_once('../usuario.php');
require_once('../servicio.php');
require_once('../horario.php');
require_once('../reservacion.php');

$crud = new crudServicio();
$crud_horario = new crudHorario();
$crud_reservacion = new crudReservacion();
$crud_usuario = new crudUsuario();
//echo"1";
if(isset($_POST['mandar']))
{
    session_start();
    if($_POST['mandar']==="compra")
    {
        if(isset($_SESSION["tipo"]))
        {
            if(isset($_POST["id_servicio"])){
                $id_servicio = $_POST["id_servicio"];
                echo $id_servicio, "\n";
            }
            if(isset($_POST["nombre_vendedor"])){
                //$nombre_vendedor = $_POST["nombre_vendedor"];
                //echo $nombre_vendedor, "\n";
                $usuario = $crud_usuario->obtenerElemento($_POST['nombre_vendedor']);
                if(is_object($usuario)){
                    $id_vendedor=$usuario->getid_usuario();
                 }
            }
            if(isset($_SESSION['nombre_usuario'])){
                //$nombre_vendedor = $_POST["nombre_vendedor"];
                //echo $nombre_vendedor, "\n";
                $usuario = $crud_usuario->obtenerElemento($_SESSION['nombre_usuario']);
                if(is_object($usuario)){
                    $id_comprador=$usuario->getid_usuario();
                 }
            }

            if(isset($_POST["cupos"])){
                $cupos = $_POST["cupos"];
                echo $cupos, "\n";
            }
            if(isset($_POST["costo"])){
                $costo = $_POST["costo"];
                echo $costo, "\n";
                $costo= $costo*$cupos;
                echo $costo, "\n";
            }
            if(isset($_POST["dia"])){
                $laFecha= $_POST["dia"];
                $dias = array('', 'Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
                $fecha = $dias[date('N', strtotime($laFecha))];

                $horarioDelServicio = $crud_horario->obtenerElemento($id_servicio);
                $diasDetrabajo = $horarioDelServicio->getDias();

                if (strpos($diasDetrabajo, $fecha) !== false) {
                    echo 'true';
                    $fecha=$laFecha;
                    echo $fecha;
                }else{
                    echo "<span style='font-weight:bold;color:reed;'>Seleccione un dia de la semana de trabajo.<span>";
                    exit;
                }
            }
            if(isset($_POST["hora"])){
                $horaSeleccionada= $_POST["hora"];
                echo $horaSeleccionada;
            }
            //$id_servicio,$id_vendedor,$id_comprador,$costo,$cupos,$fecha,$hora
            $reservacion = new Reservacion($id_servicio,$id_vendedor,$id_comprador,$costo,$cupos,$fecha,$horaSeleccionada);
            $crud_reservacion->insertar($reservacion);
            echo "<span style='font-weight:bold;color:green;'>Compra realizada.<span>";
            /*if(isset($_POST["servicio"])){
                $nombreServicio = $_POST["servicio"];
                echo $nombreServicio, "\n";
            }*/
        }
    }
}
else
{
    echo"123";
}


?>