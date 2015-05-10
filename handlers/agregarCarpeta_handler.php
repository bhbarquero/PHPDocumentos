<?php
class CarpetaHandler2 {
    function get() {
		
		$resultado = delete_Carpeta($_SESSION["carpetaPadre"]);
		header('Location:/PHPDocumentos/');
    	}
     function post() {
		$resultado = add_Carpeta($_POST['descripcion'],$_SESSION["usuarioId"],$_SESSION["carpetaPadre"]);

		header('Location:/PHPDocumentos/Carpeta/'.$_SESSION["carpetaPadre"]);
    	}
}