<?php
/**
 * admin/common.php
 * 
 * Common include for admin interface
 *
 * @author Brian Rue
 * @date 11/25/03
*/

error_reporting(E_WARNING);

// connect to mysql
$db_host = "localhost";
$db_user = "";
$db_pass = "";
$db_name = "vote";

$conn = mysql_connect($db_host, $db_user, $db_pass);
mysql_select_db($db_name);

// start session
session_start();

// set up template engine
require('libs/Smarty.class.php');

$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->debugging = false;

// functions
function validateUser() {
		global $aid, $conn;
		if (!$_SESSION["user"] || !$_SESSION["pass"]) return false;
		$query = "SELECT aid FROM admins WHERE auser='".$_SESSION["user"]."' AND apass='".$_SESSION["pass"]."'";
		$aid = @mysql_result(mysql_query($query, $conn), 0, 0);
		if (!$aid) return false;
		return true;
}

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