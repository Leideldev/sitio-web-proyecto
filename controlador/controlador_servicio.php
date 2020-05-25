<?php

require_once('../clases/crud_servicio.php');
require_once('../clases/crud_horarios.php');
require_once('../usuario.php');
require_once('../servicio.php');
require_once('../horario.php');

$crud = new crudServicio();
$crud_horario = new crudHorario();
//echo"1";
if(isset($_POST['mandar']))
{
    //echo"2";
    session_start();
    if($_POST['mandar']==="registro")
    {
        if(isset($_SESSION["tipo"]))
        {
            if($_SESSION["tipo"]=="publicista")
            {
                $servicio = new Servicio($_POST['nameSercive'],$_POST['descrip'],$_POST['costos'],$_SESSION['nombre_usuario']);
                $crud->insertar($servicio);
                //busco todos los servicicos
                $listaDeservicio = $crud->obtenerLista();
                //consigo el ultimo agrego y le saco su id
                $last = end($listaDeservicio);
                $ultimoId = $last->getId();
                //creo un horario y lo inserto
                //$id_servicio,$de,$para,$dias,$capacidad
                $dias=concatenacionDeDias();
                $horario = new Horario($ultimoId,$_POST['de'],$_POST['para'],$dias,$_POST['capa']);
                $crud_horario->insertar($horario);
                //$id_servicio,$de,$para,$dias
               
                /*$de = $_POST['de'];
                $para = $_POST['para'];
                $capa = $_POST['capa'];*/
                echo "<span style='font-weight:bold;color:green;'>Servicio registrado<span>";
               /*echo "Luenes--- ".$lunes; 
            echo "MAr--- ".$martes; 
            echo "Mier--- ".$miercoles; 
            echo "J-- ".$jueves; 
            echo "V --".$viernes; 
            echo "S-- ".$sabado; 
             echo "D ---".$domingo; 
            echo "DE-- ".$de; 
            echo "PARA --".$para; */
            }
        }
    }
    if($_POST['mandar']==="consultar")
    {
        if(isset($_SESSION["tipo"]))
        {
            $listaDeservicio = $crud->obtenerLista();
            //echo is_array($listaDeservicio) ? 'Array' : 'No es un array';
            //echo "tamaño del array: ".count($listaDeservicio);
            foreach ($listaDeservicio as $key => $servicioEnLista) {
                //echo $servicioEnLista->getNombreServicio()."---";
                echo "<li class='list-group-item noBorder'>";
                echo "   <div class='media'>";
                echo "        <div class='media-body'>";
                echo "    <a href='detalles.php?id=".$servicioEnLista->getId()."'>    <h5 class='mt-0 font-weight-bold mb-2'>".$servicioEnLista->getNombreServicio() ."</h5></a> ";
                echo "            <p class='font-italic text-muted mb-0 small'>".$servicioEnLista->getDescripcion() ."</p>";
                echo "            <h6 class='font-weight-bold my-2'>".$servicioEnLista->getCosto()."</h6>";
                echo "        </div>";
                echo "        <img title='Turismo en Ahome' alt='Evento turistico en Ahome' onclick=".'"'."location.href ='http://localhost/sitio-web-proyecto/detalles.php?id=".$servicioEnLista->getId()." ';".'"'." src='./img/paisaje.jpg' alt=''>"   ;
                echo "    </div>   ";
                echo "</li>";
            }
            echo"<li class='list-group-item noBorder'>";
            echo"        <div class='media'>";
            echo"            <div class='media-body'>";
            echo"            </div>";
            echo"            <button onclick='ActualizarLista();return false;'>actualizar</button>";
            echo"        </div>   ";
            echo"</li>";
            //$servicio = $crud->obtenerUsuario($_POST['id']);
            //echo $usuario->getNombre();
        }
    }
}
else
{
    echo"123";
}

function concatenacionDeDias(){
    $dias = '';
    if(isset($_POST['Lunes']))
    {
        $dias.= $_POST['Lunes']."-";
    }
    if(isset($_POST['Martes']))
    {
        $dias.= $_POST['Martes']."-";
    }
    if(isset($_POST['Miercoles']))
    {
        $dias.= $_POST['Miercoles']."-";
    }
    if(isset($_POST['Jueves']))
    {
        $dias.= $_POST['Jueves']."-";
    }
    if(isset($_POST['Viernes']))
    {
        $dias.= $_POST['Viernes']."-";
    }
    if(isset($_POST['Sabado']))
    {
        $dias.= $_POST['Sabado']."-";
    }
    if(isset($_POST['Domingo']))
    {
        $dias.= $_POST['Domingo']."-";
    }
    return $dias;
}


?>