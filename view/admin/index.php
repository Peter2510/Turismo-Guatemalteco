<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET) && $_GET['o']=='edit'){
        require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/controller/controller.php');
        Controller::getLugaresAdmin();
    }else if(isset($_GET) && $_GET['o']=='add'){
        require_once("agregarLugar.php");
    }else{
        require_once("dashboard.php");
    }
}else{
    
    $name = $_FILES['photo']['name'];
    $type = $_FILES['photo']['type'];
    $_FILES['photo']['size'];

    $destiny = realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/img/places/';
    move_uploaded_file($_FILES['photo']['tmp_name'],$destiny.$name);

    
    
}

?>