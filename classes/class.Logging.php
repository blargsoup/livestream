<?php

	// Logging class

	class TLogging {
		function __construct() {
			$this->logfile = '../logs/log_'.date('Y_m_d').'.txt';
		}
		function log($message) {
			$fp = fopen($this->logfile, 'a+');
			$logMessage = date("Y m d h:i:s", time())." | ".__FILE__." | ".__CLASS__." | Line: ".__LINE__." | ".$message."\n";

			$logMessage = str_replace('/var/www/livestream/', '', $logMessage);

			fwrite($fp,$logMessage);
			fclose($fp);
		}
	}
