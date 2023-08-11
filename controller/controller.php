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
                $_SESSION["usuario"] = $consulta_admin[0][0]['usuario'];
                header("Location: view/admin/dashboard.php");
                exit();
            }else if($consulta_user){
                session_start();
                $_SESSION["usuario"] = $consulta_user[0][0]['usuario'];
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
            require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/admin/lugaresTuristicos.php');
        }else{
            echo "<script>No pudo agregarse el lugar turistico, verifica que se ingresen todos los datos.</script>";
        }

        
        
    }

}
