<?php
//Test
if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
    require 'conf.php';
} 


if (isset($_GET['logout'])) {
    // unset($_SESSION);
    session_destroy();
    session_start();
    require 'conf.php';
}


//if(!isset($_SESSION['application_path'])){
//   $_SESSION['application_path']=$_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
//    //echo $_SESSION['aplication_path']=$_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
//}

if(!isset($_GET['controller']))
{
    
    require_once("view/login.php");
    
}
else
{

    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_GET['controller']);

    $accion = isset($_GET['accion']) ? $_GET['accion'] : 'Index';
    
    
    // Instanciamos el controlador
    if (file_exists("controller/".$controller."Controller.php")){
        //echo "voy carga el controlador";
        require_once($_SESSION['application_path']."/controller/".$controller."Controller.php");
        //require_once("controlador/".$controller."Controller.php");
		//echo "carga el controlador";
    }else{
        echo "Contralador no existe "."controller/".$controller."Controller.php";
    }
    

    $controller = ucwords($controller) . 'controller';

    $controller = new $controller;


    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
?>
