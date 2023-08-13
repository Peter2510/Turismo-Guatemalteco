<?php

require_once("config.php");

include('view/login.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    require_once("controller/controller.php");    

    if(!empty($_POST['email'])&&!empty($_POST['password'])){
        Controller::login($_POST['email'],$_POST['password']);
    }else{
        echo "<script>alert ('Debes ingresar un correo y contraseña');</script>";
    }

   
}







?>