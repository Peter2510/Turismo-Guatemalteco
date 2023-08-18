<?php

require_once("config.php");
require_once("controller/controller.php");    
include('view/login.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    if($_POST['action']=="login"){
            
        if(!empty($_POST['email'])&&!empty($_POST['password'])){
            Controller::login($_POST['email'],$_POST['password']);
        }else{
            echo "<script>alert ('Debes ingresar un correo y contraseña');</script>";
        }
        
    }else if($_POST['action']=='registro'){

        if(!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['user'])){

            Controller::registroUsuario($_POST['name'],$_POST['email'],$_POST['password'],$_POST['user']);

        }else{
            echo "<script>alert ('Debes ingresar todos los campos solicitados');</script>";
        }

    }
   
}

?>