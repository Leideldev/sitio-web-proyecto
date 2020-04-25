<?php

require_once('../clases/crud_usuario.php');
require_once('../usuario.php');
require_once('../servicio.php');

$crud = new crudUsuario();

if(isset($_POST['mandar']))
{
    if($_POST['mandar']==="registroUsuario")
    {
        $usuario= new Usuario($_POST['nombre'],$_POST['apellido'],$_POST['tipo_usuario'],$_POST['nombre_usuario'],password_hash($_POST['contrasena'],PASSWORD_DEFAULT));
        $crud->insertar($usuario);
    }
    if($_POST['mandar']==="mostrarUsuarios")
    {   
        $usuario = $crud->obtenerUsuario($_POST['id']);
        echo $usuario->getNombre();
    }
    if($_POST['mandar']==="login")
    {   
        $usuario = $crud->obtenerElemento($_POST['nombre_usuario']);
        if(is_object($usuario)){
           if($usuario->verificarContrasena($_POST['contrasena'])){
               echo "Contraseña correcta";
               session_start();
               if(!isset($_SESSION["tipo"])){
                $_SESSION["tipo"]=$usuario->getTipo();
               }
           }else{
            echo "Contraseña incorrecta";
           }         
        }
    }
}



?>