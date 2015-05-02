<?php

class LoginHandler {
    function get() {
		
		global $mstch;
		$_SESSION["usuarioId"]=1;
		$_SESSION["usuario"]="usuario1";
		
		if(isset($_SESSION["usuarioId"]))
			header('Location:/PHPDocumentos/MiUnidad/');
		else
			echo $mstch->render('login');
		
		
			
    }
}