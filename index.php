<?php

require_once("config.php");

include('view/login.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){
    require_once("controller/controller.php");    
    Controller::login($_POST['email'],$_POST['password']);
}







?>