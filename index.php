<?php

	require("handlers/home_handler.php");
	require("handlers/login_handler.php");

	require("lib/markdown.php");
	require("lib/mysql.php");
	require("lib/queries.php");
	require("lib/Toro.php");

	ToroHook::add("404", function() {
    	echo "Página no encontrada.";
	});

	Toro::serve(array(
		"/PHPDocumentos/" => "LoginHandler",
		"/PHPDocumentos/my-files" => "HomeHandler",
    	"/article/:alpha" => "ArticleHandler",
    	"/article/:alpha/comment" => "CommentHandler",
    	"/article/new" => "NewArticleHandler"
	));
?>