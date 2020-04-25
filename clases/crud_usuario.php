<?php 

require_once('base_conexion.php');

class crudUsuario{
//Constructor de la clase
    public function __construct(){}
//Funcion para insertar en la base de datos, se le pasa una variable de la clase Usuario y usa el metodo
// de la clase baseDatos conectar que devuelve un PDO para manipular la base de datos, también podemos usar
// metodos para preparar la sentencia de sql y para asignar los valores.
    public function insertar($usuario){
        $conexion = baseDatos::conectar();
        $insercion= $conexion->prepare('Insert INTO usuarios values(NULL, :nombre,:apellido,:tipo_usuario,:nombre_usuario,:contrasena,NULL)');
        $insercion->bindValue(':nombre',$usuario->getNombre());
        $insercion->bindValue(':apellido',$usuario->getApellido());
        $insercion->bindValue(':tipo_usuario',$usuario->getTipo());
        $insercion->bindValue(':nombre_usuario',$usuario->getNombreUsuario());
        $insercion->bindValue(':contrasena',$usuario->getContrasena());
        $insercion->execute();
    }

    public function obtenerUsuarioS($usuario){
        $conexion = baseDatos::conectar();
        $listaUsuarios = [];
        $select = $conexion->prepare('SELECT * FROM usuarios');

        foreach($select->fetchAll() as $usuarioBD){
            $usuarioLista = new Usuario($usuarioBD['nombre'],$usuarioBD['apellido'],$usuarioBD['tipo_usuario'],$usuarioBD['nombre_usuario']);
            $listaUsuarios[] = $usuarioLista;
        }
        return $listaUsuarios;
    }

    public function obtenerUsuario($id){
        $conexion = baseDatos::conectar();
        $select=$conexion->prepare('SELECT * FROM usuarios WHERE id_usuario=:id');
        $select->bindValue(':id',$id);
        $select->execute();
        $usuarioBD = $select->fetch();
        return new Usuario($usuarioBD['nombre'],$usuarioBD['apellido'],$usuarioBD['tipo_usuario'],$usuarioBD['nombre_usuario'],"");
    }
}


?>