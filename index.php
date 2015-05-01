<?php

require("handlers/categories_handler.php");
require("handlers/items_handler.php");
require("handlers/detail_handler.php");

require("handlers/carpetas_handler.php");
require("handlers/menu_handler.php");
require("handlers/archivos_handler.php");
require("handlers/grupos_handler.php");
require("handlers/integrantes_handler.php");
require("handlers/etiquetas_handler.php");

session_start();
$_SESSION["IdUsuario"]=1;

require("lib/markdown.php");
require("lib/sqlite.php");
require("lib/queries.php");
require("lib/toro.php");
require ("lib/Mustache/Autoloader.php");
Mustache_Autoloader::register();
$options =  array('extension' => '.html');
$mstch = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views', $options),
));

ToroHook::add("404", function() {
    echo "Not found";
});

Toro::serve(array(
   // "/" => "CategoriesHandler",
    //"/category/:alpha" => "ItemsHandler",
    //"/category/:alpha/comment" => "DetailHandler"
    "/PHPDocumentos/" => "MenuHandler",
    "/PHPDocumentos/MiUnidad/" => "CarpetasHandler",
    "/PHPDocumentos/Carpeta/:alpha" => "ArchivosHandler",
    "/PHPDocumentos/MisGrupos/:alpha" => "GruposHandler",
    "/PHPDocumentos/MisEtiquetas/:alpha" => "EtiquetasHandler",
    "/PHPDocumentos/integrante/:alpha" => "IntegrantesHandler"
));
