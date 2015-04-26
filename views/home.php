<?php
	
	require 'Mustache/Autoloader.php';
	Mustache_Autoloader::register();

	$options = array('extension' => '.html');

	$m = new Mustache_Engine(array(
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__),$options)));

	echo $m->render("_home");
	
?>