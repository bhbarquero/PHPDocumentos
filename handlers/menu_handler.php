<?php

class MenuHandler {
    function get() {
		global $mstch;
		$grupos= get_grupos();	
		$etiquetas=get_etiquetas();

		echo $mstch->render('principal', array(
			'grupos' => $grupos,
			'etiquetas' => $etiquetas
     	));

			
    }
}