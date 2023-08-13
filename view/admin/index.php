<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/controller/controller.php');
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(isset($_GET) && $_GET['o']=='edit'){
        Controller::getLugaresAdmin();
    }else if(isset($_GET) && $_GET['o']=='add'){
        require_once("agregarLugar.php");
    }else if(isset($_GET) && $_GET['o']=='delete'){
        Controller::eliminarLugar($_GET['id']);
    }else if(isset($_GET) && $_GET['o']=='update'){
        $id = $_GET['id'];
        Controller::obtenerLugarAdmin($id);
    }else {
        header("Location: index.php?o=edit");
        exit;
    }
}else{
    

    if(isset($_POST)&&$_POST['action']=='add'){
        
        if(isset($_FILES["photo"]["name"])&&!empty($_FILES["photo"]["name"])&&!empty($_POST['name'])&&!empty($_POST['department'])&&!empty($_POST['municipality'])&&!empty($_POST['description'])){
     
            if($_FILES["photo"]["type"]=="image/jpeg"||$_FILES["photo"]["type"]=="image/jpg"||$_FILES["photo"]["type"]=="image/png"){
    
                $name = $_FILES['photo']['name'];
                $type = $_FILES['photo']['type'];
                $_FILES['photo']['size'];
    
                $randomNum = mt_rand(50,999);
                $randoChar = chr(rand(ord("a"), ord("z")));
                $nameImg = $randomNum.$randoChar.$name;
                $destiny = realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/img/places/';
                move_uploaded_file($_FILES['photo']['tmp_name'],$destiny.$nameImg);
                Controller::agregarLugarAdmin($_POST['name'],$_POST['department'],$_POST['municipality'],$_POST['description'],$nameImg);
    
            }else{
                require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/admin/agregarLugar.php');
                echo "<script>alert('El formato de la imagen debe ser png, jpeg o jpg');</script>";
    
            }
         
        }else{
            echo "<script>alert('Debes ingresar todos los datos solicitados');</script>";
            require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/admin/agregarLugar.php');
            
        }

    }else if(isset($_POST)&&$_POST['action']=='update'){

        
            if(!empty($_POST['name'])&&!empty($_POST['department'])&&!empty($_POST['municipality'])&&!empty($_POST['description'])){
            

                if(isset($_FILES['photo']['name'])&&!empty($_FILES['photo']['name'])){
                    if($_FILES["photo"]["type"]=="image/jpeg"||$_FILES["photo"]["type"]=="image/jpg"||$_FILES["photo"]["type"]=="image/png"){
    
                        $name = $_FILES['photo']['name'];
                        $type = $_FILES['photo']['type'];
                        $_FILES['photo']['size'];
            
                        $randomNum = mt_rand(50,999);
                        $randoChar = chr(rand(ord("a"), ord("z")));
                        $nameImg = $randomNum.$randoChar.$name;
                        $destiny = realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/img/places/';
                        move_uploaded_file($_FILES['photo']['tmp_name'],$destiny.$nameImg);
                        Controller::actualizarLugarCF($_POST['id'],$_POST['name'],$_POST['department'],$_POST['municipality'],$_POST['description'],$nameImg);
            
                    }else{
                        require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/Turismo-Guatemalteco/view/admin/agregarLugar.php');
                        echo "<script>alert('El formato de la imagen debe ser png, jpeg o jpg');</script>";            
                    }

                }else{
                    Controller::actualizarLugarSF($_POST['id'],$_POST['name'],$_POST['department'],$_POST['municipality'],$_POST['description']);
                }
                
            }else{
                echo "<script>alert('Debes ingresar todos los datos solicitados');</script>";
            }

            

    }else{

        echo "else";
        var_dump($_POST);
    }






    

    
}
