<?php
	
	require 'Mustache/Autoloader.php';
	Mustache_Autoloader::register();

	$options = array('extension' => '.html');

	$m = new Mustache_Engine(array(
	'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__),$options)));


	session_start();
	$_SESSION["usuario"]='hola';

	if(isset($_SESSION["usuario"]))
		header('Location: /PHPDocumentos/my-files');
	else
		echo $m->render("_login");
	
?>