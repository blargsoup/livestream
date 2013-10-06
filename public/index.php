<?php
//	Controller
	echo 'fuck this';

	require_once("../classes/class.Authentication.php");
	require_once("../classes/class.Session.php");

	$Session		= new TSession();
	$Authentication = new TAuthentication();


	$ControllerVars['loggedin'] = 0;

	if ($Authentication->isAuthorized()) {
		
		$ControllerVars['loggedin'] = 1;
		//logged in
		echo 'you are logged in.<br />';

	} else {
		echo 'else not logged in';
		if ($_POST['submit'] == 'submit') {
			if ($Authentication->checkUserPass()) {
				$ControllerVars['loggedin'] = 1; 
				$Authentication->successfulLogin();
			}else{
				$Authentication->failedLogin();

			}
		}

		// not logged in

	
	}
	echo 'login status is: '.$ControllerVars['loggedin'];

	if ($ControllerVars['loggedin'] == 0){
		$content = file_get_contents("../templates/login.html");
		echo $content;

	}

	die;

	// if accessing the root, display the index file in templates
	if ($_SERVER['REQUEST_URI'] == '/') {
		$content = file_get_contents("../templates/index.html");
		$content = str_replace('{text}', 'this text has replaced', $content);
		echo $content;
	} else {
    	echo "you are not on the homepage<br />";
	}		



echo "<br /><br /><br />";
echo $_SERVER['REQUEST_URI'];
