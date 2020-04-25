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
        $crud->insertarServicio($servicio);
    }
    if($_POST['mandar']==="registroUsuario")
    {
        $usuario= new Usuario($_POST['nombre'],$_POST['apellido'],$_POST['tipo_usuario'],$_POST['nombre_usuario'],$_POST['contrasena']);
        $crud->insertar($usuario);
    }
    if($_POST['mandar']==="mostrarUsuarios")
    {   
        $usuario = $crud->obtenerUsuario($_POST['id']);
        echo $usuario->getNombre();
    }
}
else
{
    echo"123";
}


?>