<?php

class CarpetasHandler {
    function get() {
		global $mstch;
		$carpetas=get_carpetas($_SESSION["IdUsuario"]);
		$_SESSION["Etiqueta"]=0;
		$grupos= get_grupos();
		$etiquetas=get_etiquetas();
		echo $mstch->render('principal', array(
     	'carpetas' => $carpetas,
     	'grupos' => $grupos,
     	'etiquetas' => $etiquetas));

			
    }
}