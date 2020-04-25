<?php

require_once('../clases/crud_usuario.php');
require_once('../usuario.php');
 
$crud = new crudUsuario();
//$usuario= new Usuario($_POST['nombre'],$_POST['apellido'],$_POST['tipo_usuario'],$_POST['nombre_usuario'],$_POST['contrasena']);

//$crud->insertar($usuario);


$usuario = $crud->obtenerUsuario($_GET['id']);

echo $usuario->getNombre();

?>