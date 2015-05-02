<?php

/*MANEJO DE SESIÓN GLOBAL*/
session_start();

/*HANDLERS REQUERIDOS*/
require("handlers/categories_handler.php");
require("handlers/items_handler.php");
require("handlers/detail_handler.php");
require("handlers/miunidad_handler.php");
require("handlers/login_handler.php");
require("handlers/singout_handler.php");
require("handlers/carpeta_handler.php");
require("handlers/grupos_handler.php");
require("handlers/integrantes_handler.php");
require("handlers/etiquetas_handler.php");

/*LIBRERIAS REQUERIDAS*/
require("lib/markdown.php");
require("lib/sqlite.php");
require("lib/queries.php");
require("lib/toro.php");
require ("lib/Mustache/Autoloader.php");

/*CONFIGURACIÓN MUSTACHE*/
Mustache_Autoloader::register();
$options =  array('extension' => '.html');
$mstch = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views', $options),
));

/*CONFIGURACIÓN TORO*/
ToroHook::add("404", function() {
    echo "Not found";
});

Toro::serve(array(
   // "/" => "CategoriesHandler",
    //"/category/:alpha" => "ItemsHandler",
    //"/category/:alpha/comment" => "DetailHandler"
    "/PHPDocumentos/" => "LoginHandler",
    "/PHPDocumentos/SingOut/" => "SingOutHandler",
    "/PHPDocumentos/MiUnidad/" => "MiUnidadHandler",
    "/PHPDocumentos/Carpeta/:alpha" => "CarpetaHandler",
    "/PHPDocumentos/MisGrupos/:alpha" => "GruposHandler",
    "/PHPDocumentos/MisEtiquetas/:alpha" => "EtiquetasHandler",
    "/PHPDocumentos/integrante/:alpha" => "IntegrantesHandler"
));
