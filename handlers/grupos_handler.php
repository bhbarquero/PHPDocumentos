<?php

class GruposHandler {
    function get($idGrupo) {
		global $mstch;
		$_SESSION["IdGrupo"]=$idGrupo;
		$grupos= get_grupos();
		$etiquetas=get_etiquetas();
		$integrantes=get_integrantes($idGrupo);
		echo $mstch->render('principal', array(
     	'integrantes' => $integrantes,
     	'grupos' => $grupos,
     	'etiquetas' => $etiquetas));

			
    }
}