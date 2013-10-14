<?php

	// Sanitization class

	class TSanitization {
		function __construct() {

		}

		function alphaNumeric($value) {
			$value = preg_replace('|[^a-z0-9]|imsx', '', $value);
			return $value;
		}

		function alphaNumericSpace($value) {

			$value = preg_replace('|[^a-z0-9]|imsx', '', $value);
			return $value;
		}
	}

	// Unit tests
/*
	$Sanitization = new TSanitization();
	echo $Sanitization->alphaNumeric("testing#$#$#R#");
*/

