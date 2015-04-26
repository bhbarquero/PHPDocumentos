<?php
	require("lib/markdown.php");
	require("lib/mysql.php");
	require("lib/queries.php");
	require("lib/Toro.php");

	ToroHook::add("404", function() {
    	echo "Página no encontrada.";
	});

	Toro::serve(array(
    	"/" => "ArticlesHandler",
    	"/article/:alpha" => "ArticleHandler",
    	"/article/:alpha/comment" => "CommentHandler",
    	"/article/new" => "NewArticleHandler"
	));
?>