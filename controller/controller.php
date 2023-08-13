<?php

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/model/model.php');

class Controller{
    private $model;

    function __construct()
    {
        $this->model = new Model();

    }


    //Realizar la verificacion del login
    static function login($correo,$contrasenia){

        $consulta = new Model();
               
            $consulta_admin = $consulta->consultarAdmin($correo,$contrasenia);
            $consulta_user = $consulta->consultarUsuario($correo,$contrasenia);
            
            if($consulta_admin){
                session_start();
                $_SESSION["admin_sesion"] = $consulta_admin[0][0]['usuario'];
                header("Location: view/admin/dashboard.php");
                exit();
            }else if($consulta_user){
                session_start();
                $_SESSION["user_sesion"] = $consulta_user[0][0]['usuario'];
                header("Location: view/user/user.php");
                exit();
            }else{
                echo("<script>alert('Usuario o contraseña incorrecto. Verifica tus credenciales')</script>");
            }
        
    }


    //Mostrar todos los lugares turisticos admin
    static function getLugaresAdmin(){
        $consulta = new Model();
        $lugares = $consulta->listarTodosLugares();
        require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/admin/lugaresTuristicos.php');
    }

    //Mostrar todos los lugares turisticos usuario
    static function getLugaresUser(){
        $consulta = new Model();
        $lugares = $consulta->listarTodosLugares();
        require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/user/sitios.php');
    }

    //Agregar nuevo lugar turistico 
    static function agregarLugarAdmin($nombre,$departamento,$municipio,$descripcion,$foto){
        $accion = new Model();
        
        if($accion->insertarLugar($nombre,$departamento,$municipio,$descripcion,$foto)){
            
            $lugares = $accion->listarTodosLugares();
            header("Location: index.php?o=edit");
            exit;   
        }else{
            echo "<script>alert('No pudo agregarse el centro turistico, verifica los datos ingresados');</script>";
        }

    }


    //obtener un lugar
    static function obtenerLugarAdmin($id){
        
        $consulta = new Model();
        $lugar = $consulta->obtenerLugar($id);
        if($lugar){
            require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/admin/editarLugar.php');
        }else{
            header("Location: index.php?o=edit");
        }
        
    }

    //editar lugar
    static function actualizarLugarSF($id, $nombre,$departamento,$municipio,$descripcion){
        $actualizar = new Model();
        $accion = $actualizar->editarLugarSF($id,$nombre,$departamento,$municipio,$descripcion);
        if($accion){
            echo "<script>alert('Se edito exitosamente el centro turistico.');</script>";
            $lugares = $actualizar->listarTodosLugares();
            require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/admin/lugaresTuristicos.php');

        }else{
            echo "<script>alert('No pudo editarse el centro turistico $nombre, verifica los datos ingresados');</script>";
        }
    }

    static function actualizarLugarCF($id, $nombre,$departamento,$municipio,$descripcion,$foto){
        $actualizar = new Model();
        $accion = $actualizar->editarLugarCF($id,$nombre,$departamento,$municipio,$descripcion,$foto);
        if($accion){
            echo "<script>alert('Se edito exitosamente el centro turistico.');</script>";
            $lugares = $actualizar->listarTodosLugares();
            header("Refresh:0.01; index.php?o=edit"); // Cambia "destino.php" a la página de destino
            exit;
            //require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/admin/lugaresTuristicos.php');
            

        }else{
            echo "<script>alert('No pudo editarse el centro turistico $nombre, verifica los datos ingresados');</script>";
        }
    }


    //Eliminar lugar admin
    static function eliminarLugar($id){
        $eliminar = new Model();
        
        if($eliminar->eliminarLugar($id)){
            $lugares = $eliminar->listarTodosLugares();
            header("Location: index.php?o=edit");
            exit;
            
        }else{
            require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/admin/dashboard.php');
        }
        
        
    }

}
