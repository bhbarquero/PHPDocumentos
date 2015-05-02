<?php
class CarpetaHandler {
    function get($idCarpeta) {
		global $mstch;

		if(isset($_SESSION["usuarioId"])){
				
			$carpetas=get_carpetas($_SESSION["usuarioId"]);
			$usuario = $_SESSION["usuario"];
			$archivos=get_archivos($idCarpeta);
			$grupos= get_grupos();
			$etiquetas=get_etiquetas();
			
			echo $mstch->render('header',array(
				'usuario'=>$usuario
			));
			
			echo $mstch->render('miunidad', array(
	     	'carpetas' => $carpetas,
	     	'archivos' => $archivos,
	     	'grupos' => $grupos,
	     	'etiquetas' => $etiquetas));
			 
			 echo $mstch->render('footer');
		}
		else
			header('Location:/PHPDocumentos/');
	
    	}
}