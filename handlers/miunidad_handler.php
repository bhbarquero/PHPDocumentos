<?php

class MiUnidadHandler {
    function get() {
		
		global $mstch;
		$carpetas=get_carpetas($_SESSION["usuarioId"]);
		$grupos= get_grupos();
		$etiquetas=get_etiquetas();
		
		echo $mstch->render('header');
		
		echo $mstch->render('miunidad', array(
     	//'carpetas' => $carpetas,
     	'grupos' => $grupos,
     	'etiquetas' => $etiquetas));
		 
		 echo $mstch->render('footer');

			
    }
}