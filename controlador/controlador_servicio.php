<?php

require_once('../clases/crud_usuario.php');
require_once('../usuario.php');
require_once('../servicio.php');

$crud = new crudUsuario();
echo"1";
if(isset($_POST['mandar']))
{
    echo"2";
    if($_POST['mandar']==="registro")
    {
        $servicio = new Servicio($_POST['nameSercive'],$_POST['descrip'],$_POST['costos'],"vendedor");
        $crud->insertar($servicio);
    }
}
else
{
    echo"123";
}


?>