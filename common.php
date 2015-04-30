<?php
/**
 * common.php
 * 
 * Common include for student interface
 *
 * @author Brian Rue
 * @date 11/25/03
*/

error_reporting(E_WARNING);

// connect to mysql
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "vote";

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

// start session
session_start();

// set up template engine
require('libs/Smarty.class.php');

$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->debugging = false;

// functions
function redirect($url,$message="") {
	if ($message == "") {
		header("Location: ".$url);
	} else {
		if (strpos($url,"?") === false) {
			header("Location: ".$url."?message=".urlencode($message));
		} else {
			header("Location: ".$url."&message=".urlencode($message));
		}
	}
	exit;
}

function errordirect($message) {
	header("Location: error.php?".urlencode($message));
	exit;
}
?>