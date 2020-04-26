<?php

require_once('../clases/crud_usuario.php');
require_once('../clases/crud_servicio.php');
require_once('../usuario.php');
require_once('../servicio.php');

$crud = new crudServicio();
echo"1";
if(isset($_POST['mandar']))
{
    echo"2";
    session_start();
    if($_POST['mandar']==="registro")
    {
        if(isset($_SESSION["tipo"]))
        {
            if($_SESSION["tipo"]=="publicista")
            {
                $servicio = new Servicio($_POST['nameSercive'],$_POST['descrip'],$_POST['costos'],"vendedor");
                $crud->insertar($servicio);
                echo"servicio agregado";
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
                echo $servicioEnLista->getNombreServicio()."---";
            }
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