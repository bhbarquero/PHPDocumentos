<?php

class HomeHandler {

    function get() {
		include("views/home.php");
		/*session_start();

		//temporal, para pruebas
		$_SESSION["usuario"] = "bhernandez";

		if(isset($_SESSION["usuario"]))
        	include("views/inicio.php");
        else
        	include("views/inicio.php");*/
    }
}