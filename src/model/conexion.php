<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

    define('HOST','localhost'); //AQUI VA TU HOST
    define('USER','root');
    define('PASS','mao123');
    define('DBNAME','cvp_001');

class connection{
    
    function __construct()
	{	
        $conn = mysqli_connect(HOST, USER, PASS, DBNAME);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
    mysqli_close($conn);

        return true;
    }

}

$_conexion = new connection();