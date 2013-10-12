<?php
//	Controller

	require_once("../classes/class.Session.php");
	require_once("../classes/class.Database.php");
	require_once("../classes/class.Logging.php");
	require_once("../classes/class.ParseURI.php");

	$Session		= new TSession();
	$Database		= new TDatabase();
	$Logging		= new TLogging();
	$ParseURI		= new TParseURI($_SERVER['REQUEST_URI']);

	$Logging->log("Starting script...");

	die;

	// if accessing the root, display the index file in templates
	if ($_SERVER['REQUEST_URI'] == '/') {
		$content = file_get_contents("../templates/index.html");
		$content = str_replace('{text}', 'this text has replaced', $content);
		echo $content;
	} else {
    	echo "you are not on the homepage<br />";
	}		



