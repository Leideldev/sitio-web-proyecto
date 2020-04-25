<?php

class Usuario
{
 public $nombre;
 public $apellido;
 public $tipo;
 private $nombreUsuario;
 private $contrasena;
//Constructor de la clase
 public function __construct($nombre,$apellido,$tipo,$nombreUsuario,$contrasena)
 {
     $this->nombre = $nombre;
     $this->apellido = $apellido;
     $this->tipo = $tipo;
     $this->nombreUsuario = $nombreUsuario;
     $this->contrasena = $contrasena;
 }
 
 public function getNombre(){
     return $this->nombre;
 }

 public function getApellido(){
    return $this->apellido;
}

public function getTipo(){
    return $this->tipo;
}

public function getNombreUsuario(){
    return $this->nombreUsuario;
}

public function getContrasena(){
    return $this->contrasena;
}

public function setNombre($nombre){
    $this->nombre = $nombre;
}

public function setApellido($apellido){
    $this->apellido = $apellido;
}

public function setTipo($tipo){
    $this->tipo = $tipo;
}

public function setNombreUsuario($nombreUsuario){
    $this->nombreUsuario = $nombreUsuario;
}

public function setContrasena($contrasena){
    $this->contrasena = $contrasena;
}

public function verificarContrasena($contrasena){
return password_verify($contrasena,$this->contrasena);
}

}

?>