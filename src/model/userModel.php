<?php

require_once($_SESSION['application_path']."/model/conexion.php");

class userModel extends connection{

    function __construct()
	{
        parent::__construct();
    }


    public function getUser($tabla,$condiciones){
        return $this->getRows($tabla,$condiciones);
    }
}
?>