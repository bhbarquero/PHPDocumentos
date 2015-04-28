<?php

class IntegrantesHandler {
    function get($IdUsuario) {
		global $mstch;
		$grupos= get_grupos();
		$integrante=get_integrante($IdUsuario);
		$etiquetas=get_etiquetas();
		$integrantes=get_integrantes($_SESSION["IdGrupo"]);
		echo $mstch->render('principal', array(
		'integrantes' => $integrantes,
     	'grupos' => $grupos,
     	'integrante' => $integrante,
     	'etiquetas' => $etiquetas));

			
    }
}