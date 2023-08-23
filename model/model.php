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
        $stmt = $this->conexion->prepare('INSERT INTO admin VALUES (:correo,AES_ENCRYPT(:contrasenia, "cunocXela2023"),:usuario)');
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
        $stmt = $this->conexion->prepare('SELECT * FROM admin WHERE correo = :correo AND contrasenia = AES_ENCRYPT(:contrasenia, "cunocXela2023")');
        $stmt->execute(array('correo' => $correo,'contrasenia' => $contrasenia));
        
        while ($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $this->data[] = $rows;
        }
        return $this->data;
    }
    
    /**CONSULTAR CORREO ADMINISTRADORES */
    public function consultarCorreoAdmin($correo)
    {
        $stmt = $this->conexion->prepare('SELECT * FROM admin WHERE correo = :correo');
        $stmt->execute(array('correo' => $correo));
        
        while ($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $this->data[] = $rows;
        }
        return $this->data;
    }

    public function listarAdmin(){
        $stmt = $this->conexion->prepare('SELECT * FROM admin');
        $stmt->execute();

        while ($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $this->data[] = $rows;
        }
        return $this->data;
    }

    /**INSERTAR USUARIOS */
    public function insertarUsuario($nombre, $correo,$contrasenia,$usuario)
    {
        $stmt = $this->conexion->prepare('INSERT INTO usuario VALUES (:nombre,:correo,AES_ENCRYPT(:contrasenia, "cunocXela2023"),:usuario)');
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
        $stmt = $this->conexion->prepare('SELECT * FROM usuario WHERE correo = :correo AND contrasenia = AES_ENCRYPT(:contrasenia, "cunocXela2023")');
        $stmt->execute(array('correo' => $correo,'contrasenia' => $contrasenia));
        
        while ($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $this->data[] = $rows;
        }
        return $this->data;
    }

    /**CONSULTAR CORREO USUARIO */
    public function consultarCorreoUsuario($correo)
    {
        $stmt = $this->conexion->prepare('SELECT * FROM usuario WHERE correo = :correo');
        $stmt->execute(array('correo' => $correo));
        
        while ($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $this->data[] = $rows;
        }
        return $this->data;
    }

    /**INSERTAR LUGAR */
    public function insertarLugar($nombre,$departamento,$municipio,$descripcion,$foto)
    {

        $saltoLinea = str_replace(array("\r\n", "\r", "\n"), "<br/>", $descripcion);
        $stmt = $this->conexion->prepare('INSERT INTO lugar VALUES (NULL,:nombre,:departamento,:municipio,:descripcion,:foto)');
        $stmt->execute(array('nombre'=>$nombre,'departamento'=>$departamento,'municipio'=>$municipio,'descripcion' => $saltoLinea,'foto' => $foto));

        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    /** EDITAR LUGAR */

    public function editarLugarSF($id, $nombre,$departamento,$municipio,$descripcion)
    {
        $saltoLinea = str_replace(array("\r\n", "\r", "\n"), "<br/>", $descripcion);
        $stmt = $this->conexion->prepare('UPDATE lugar SET nombre = :nombre, departamento= :departamento, municipio = :municipio, descripcion = :descripcion WHERE id = :id');
        $stmt->execute(array('nombre'=>$nombre,'departamento'=>$departamento,'municipio'=>$municipio,'descripcion' => $saltoLinea, 'id' =>$id  ));

        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function editarLugarCF($id, $nombre,$departamento,$municipio,$descripcion,$foto)
    {
        $saltoLinea = str_replace(array("\r\n", "\r", "\n"), "<br/>", $descripcion);
        $arrayPhoto = $this->obtenerFoto($id);
        unlink(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/img/places/'.$arrayPhoto[0][0]["foto"]);
        $stmt = $this->conexion->prepare('UPDATE lugar SET nombre = :nombre, departamento= :departamento, municipio = :municipio, descripcion = :descripcion, foto = :foto WHERE id = :id');
        $stmt->execute(array('nombre'=>$nombre,'departamento'=>$departamento,'municipio'=>$municipio,'descripcion' => $saltoLinea,'foto'=>$foto, 'id'=> $id ));

        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    /**ELIMINAR LUGAR */
    public function eliminarLugar($id)
    {
        $arrayPhoto = ( $this->obtenerFoto($id));
        unlink(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/img/places/'.$arrayPhoto[0][0]["foto"]);
        $stmt = $this->conexion->prepare('DELETE FROM lugar WHERE id = :id');
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

    public function obtenerFoto($id)
    {
        $stmt = $this->conexion->prepare('SELECT foto FROM lugar WHERE id = :id');
        $stmt->execute(array('id'=>$id));

        while ($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $this->data[] = $rows;
        }
        return $this->data;
    }

    public function obtenerLugar($id){
        $stmt = $this->conexion->prepare('SELECT * FROM lugar WHERE id = :id');
        $stmt->execute(array('id'=>$id));

        while ($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            $this->data[] = $rows;
        }
        return $this->data;
    }

}
