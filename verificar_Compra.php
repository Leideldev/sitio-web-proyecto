<?php 
//incluye la clase Libro y CrudLibro
require_once('./clases/crud_servicio.php');
require_once('servicio.php');
$crud=new crudServicio();
$servicio= new Servicio("","","","  ");
session_start();
//obtiene todos los libros con el método mostrar de la clase crud
//$servicio=$crud->obtenerElemento($_GET["evento"]);

if(isset($_POST["servicio"])){
    $nombreServicio = $_POST["servicio"];
    echo $nombreServicio, "\n";
}
if(isset($_POST["costo"])){
    $costo = $_POST["costo"];
    echo $costo, "\n";
}
if(isset($_POST["fecha"])){
    $fecha = $_POST["fecha"];
    echo $fecha, "\n";
    $timestamp = strtotime($fecha);
    echo $timestamp;
}
if(isset($_POST["vendedor"])){
    $nombreVendedor = $_POST["vendedor"];
    echo $nombreVendedor, "\n";
}
if(isset($_SESSION['nombre_usuario']))
{
    echo $_SESSION['nombre_usuario'], "\n";
}

//echo $lala+"---"+$lala2+"---"+$lala3;
?>