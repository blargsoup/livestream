<?php
	class TPageClass {
		function __construct($className) {

			if (file_exists("../templates/pages/".$className.".html")){
				$content = file_get_contents("../templates/pages/".$className.".html");
				echo $content;
		
			} else {
				echo "page content not found<br />";
			}
		}
	}
