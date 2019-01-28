<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

require_once($_SESSION['application_path']."/model/userModel.php");

class userController{


    private $_userModel=null;
    function __construct()
	{	
        //echo "fue construido objeto customerController";	
    }

    public function loginUser(){
        $this->cleanVariables();
        if(!isset($_POST['username']) or !isset($_POST['password'])){
            require_once("view/login.php");
        }else{
            $_user=$_POST['username'];
            $_pass=$_POST['password'];

            $_user = $this->validateUser($_user,$_pass);
            if($_user==false){
                Header("Location: ?aditionalMessage=User or password are incorrect, please try again&controller=user&accion=loginUser");
            }else{
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $_user['nombre_usuario'];
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
                $_SESSION['email'] = $_user['email'];
                $_SESSION['profile'] = 'admin';

                require_once("view/dashboard.php");
            }
            
        }
        
		
    }

    public function validateUser($user,$password){
        if($this->_userModel==null){
            $this->_userModel=new userModel();
        }
        $conditions['where'] = array(
            'usuario' => $user,
            'pass' => $password,
        );
        $conditions['return_type'] = 'single';
        $userData = $this->_userModel->getUser('usuario', $conditions);
        return $userData;
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