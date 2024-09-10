<?php
// Before removing this file, please verify the PHP ini setting `auto_prepend_file` does not point to this.

// This file was the current value of auto_prepend_file during the Wordfence WAF installation (Sun, 08 Sep 2024 21:43:09 +0000)
if (file_exists('C:/Users/Det-Pc/AppData/Local/Programs/Local/resources/extraResources/local-bootstrap.php')) {
	include_once 'C:/Users/Det-Pc/AppData/Local/Programs/Local/resources/extraResources/local-bootstrap.php';
}
if (file_exists(__DIR__.'/wp-content/plugins/wordfence/waf/bootstrap.php')) {
	define("WFWAF_LOG_PATH", __DIR__.'/wp-content/wflogs/');
	include_once __DIR__.'/wp-content/plugins/wordfence/waf/bootstrap.php';
}