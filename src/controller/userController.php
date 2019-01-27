<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

class userController{


    private $_userModel=null;
    function __construct()
	{	
        //echo "fue construido objeto customerController";	
    }

    public function loginUser(){
        $this->cleanVariables();
    
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = "Mauricio";
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
        $_SESSION['email'] = "mauricio.rincon@gmail.com";
        $_SESSION['profile'] = 'admin';
		
		require_once("view/dashboard.php");
		
    }

    public function cleanVariables(){
        unset ($_SESSION['loggedin']);
        unset ($_SESSION['username']);
        unset ($_SESSION['start']);
        unset ($_SESSION['expire']);
        unset ($_SESSION['email']);
        unset ($_SESSION['profile']);
        //session_destroy();
    }
}