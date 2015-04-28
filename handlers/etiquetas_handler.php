<?php

class EtiquetasHandler {
    function get($idEtiqueta) {
		global $mstch;
		$_SESSION["IdEtiqueta"]=$idEtiqueta;
		$_SESSION["Etiqueta"]=1;
		$grupos= get_grupos();
		$etiquetas=get_etiquetas();
		$carpetas=get_carpetasXetiqueta($idEtiqueta);
		echo $mstch->render('principal', array(
     	'carpetas' => $carpetas,
     	'grupos' => $grupos,
     	'etiquetas' => $etiquetas));

			
    }
}