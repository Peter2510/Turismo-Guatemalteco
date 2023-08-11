<?php

class Model
{
    private $Modelo;
    private $conexion;
    private $data;

    public function __construct()
    {
        $this->Modelo = array();
        $host = "localhost";
        $user = 'turismo_admin';
        $pass = 'phpturismo?';
        $database = 'turismo';

        try {
            $this->conexion = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
        } catch (PDOException $error) {
            die("Could not connect to the database $database :" . $error->getMessage());
        }
    }

    /**INSERTAR ADMINISTRADORES */
    public function insertarAdmin($correo,$contrasenia,$usuario)
    {
        $stmt = $this->conexion->prepare('INSERT INTO admin VALUES (:correo, ,:contrasenia),:usuario)');
        $stmt->execute(array('correo' => $correo,'contrasenia' => $contrasenia,'usuario'=>$usuario));

        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    /**CONSULTAR ADMINISTRADORES */
    public function consultarAdmin($correo,$contrasenia)
    {
        $stmt = $this->conexion->prepare('SELECT * FROM admin WHERE correo = :correo AND contrasenia = :contrasenia');
        $stmt->execute(array('correo' => $correo,'contrasenia' => $contrasenia));
        
        while ($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $this->data[] = $rows;
        }
        return $this->data;
    }

    /**INSERTAR USUARIOS */
    public function insertarUsuario($nombre, $correo,$contrasenia,$usuario)
    {
        $stmt = $this->conexion->prepare('INSERT INTO usuario VALUES (:nombre,:correo, ,:contrasenia,:usuario)');
        $stmt->execute(array('nombre'=>$nombre,'correo' => $correo,'contrasenia' => $contrasenia,'usuario'=>$usuario));
        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    /** CONSULTAR USUARIOS */
    public function consultarUsuario($correo,$contrasenia)
    {
        $stmt = $this->conexion->prepare('SELECT * FROM usuario WHERE correo = :correo AND contrasenia = :contrasenia');
        $stmt->execute(array('correo' => $correo,'contrasenia' => $contrasenia));
        
        while ($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $this->data[] = $rows;
        }
        return $this->data;
    }

    /**INSERTAR LUGAR */
    public function insertarLugar($nombre,$departamento,$municipio,$descripcion,$foto)
    {
        $stmt = $this->conexion->prepare('INSERT INTO lugar VALUES (NULL,:nombre,:departamento,:municipio,:descripcion,:foto)');
        $stmt->execute(array('nombre'=>$nombre,'departamento'=>$departamento,'municipio'=>$municipio,'descripcion' => $descripcion,'foto' => $foto));

        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    /**ELIMINAR LUGAR */
    public function eliminarLugar($id)
    {
        $stmt = $this->conexion->prepare('DELETE FROM lugar WHERE = :id ');
        $stmt->execute(array('id'=>$id));

        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    /**CONSULTAR TODOS LOS LUGARES */
    public function listarTodosLugares()
    {
        $stmt = $this->conexion->prepare('SELECT * FROM lugar');
        $stmt->execute();

        while ($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $this->data[] = $rows;
        }
        return $this->data;
    }
}
