<?php

class ArchivosHandler {
    function get($idCarpeta) {
		global $mstch;

		//if($_SESSION["Etiqueta"]=0)
		//{
			$carpetas=get_carpetas($_SESSION["IdUsuario"]);
		//}
		//else
		//{
		//	if($_SESSION["Etiqueta"]=1)
		//	$carpetas=get_carpetasXetiqueta($_SESSION["IdEtiqueta"]);
		//}
		$archivos=get_archivos($idCarpeta);
		$grupos= get_grupos();
		$etiquetas=get_etiquetas();
		echo $mstch->render('principal', array(
     	'carpetas' => $carpetas,
     	'archivos' => $archivos,
     	'grupos' => $grupos,
     	'etiquetas' => $etiquetas));

			
    }
}