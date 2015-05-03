<?php

class MiUnidadHandler {
    function get() {
		$CarpetaPadre=0;
		//$MigasPan =$_SESSION['MigasPan'];	
		$MigasPan = "0-Mi Unidad";
		//array_push($MigasPan,array("Id" => "0", "Carpeta" => "Mi Unidad"));
		$_SESSION['MigasPan']= $MigasPan;
		global $mstch;
		$carpetas=get_carpetas($_SESSION["usuarioId"],$CarpetaPadre);
		$grupos= get_grupos();
		$etiquetas=get_etiquetas();
		$usuario=$_SESSION["usuario"];
		
		$MigasArray = array(
				"Id" => "0",
				"Carpeta" => "Mi Unidad");
		
		echo $mstch->render('header',array(
			'usuario' => $usuario
		));
		
		echo $mstch->render('miunidad', array(
     	'carpetas' => $carpetas,
     	'grupos' => $grupos,
     	'etiquetas' => $etiquetas,
		'migas' => $MigasArray));
		 
		 echo $mstch->render('footer');

			
    }
}