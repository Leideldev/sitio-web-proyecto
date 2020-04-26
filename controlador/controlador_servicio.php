<?php

require_once('../clases/crud_servicio.php');
require_once('../usuario.php');
require_once('../servicio.php');

$crud = new crudServicio();
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
                $servicio = new Servicio($_POST['nameSercive'],$_POST['descrip'],$_POST['costos'],"vendedor");
                $crud->insertar($servicio);
                echo "<span style='font-weight:bold;color:green;'>Servicio registrado<span>";
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
                echo "            <h5 class='mt-0 font-weight-bold mb-2'>".$servicioEnLista->getNombreServicio() ."</h5> ";
                echo "            <p class='font-italic text-muted mb-0 small'>".$servicioEnLista->getDescripcion() ."</p>";
                echo "            <h6 class='font-weight-bold my-2'>".$servicioEnLista->getCosto()."</h6>";
                echo "        </div>";
                echo "        <img src='./img/paisaje.jpg' alt=''>"   ;
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


?>