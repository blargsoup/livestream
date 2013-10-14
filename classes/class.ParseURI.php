<?php

	require_once('class.Logging.php');
	require_once('class.Authentication.php');

	class TParseURI {
		function __construct($uri) {
			$this->Authentication 	= new TAuthentication();
			$this->Logging 			= new TLogging();
			$this->doAuthentication();

			if (preg_match('|^/([^/]+)|imsx', $uri, $pmatches)){
				$className = $pmatches[1];
			} else {
				$className = 'homepage';
			}	
			

			if (strlen($className) > 32) {
				$this->Logging->Log("exiting script, directory name is 64 characters or more");
				die("unexpected error");
			}

			// sanitize the className
			$className = preg_replace('|[^a-z0-9-_]|imsx', '', $className);


			if (file_exists("../classes/pages/class.".$className.".php")) {
				require_once("../classes/pages/class.".$className.".php");
				$pageClass = new TPageClass($className);

			} else {
				die("Page not found");
			}

			$this->pageName = '';

			// root URL  : http://localhost/
			if ($uri == '/') {
				$this->pageName = 'root';	
				
			}
			
			// /signup
			if ($uri == '/signup') {
				$this->pageName = 'signup';
			}		


			// /login
			if ($uri == '/login') {
				$this->pageName = 'login';
			}
		}


		function getPageName() {
			return $this->pageName;
		}

		function doAuthentication(){
			$ControllerVars['loggedin'] = 0;

			if ($this->Authentication->isAuthorized()) {
				

				$ControllerVars['loggedin'] = 1;

			} else {
				if ($_POST['submit'] == 'submit') {
					if ($this->Authentication->checkUserPass()) {
						$ControllerVars['loggedin'] = 1; 
						$this->Authentication->successfulLogin();
					} else {
						$this->Authentication->failedLogin();

					}
				}

				// not logged in

			
			}

			if ($ControllerVars['loggedin'] == 0){

			}
		}
	}
