<?php
/**
 * login.php
 *
 * Script to manage logins
 *
 * @author Brian Rue
 * @date 11/25/03
*/

require 'common.php';

if (validateUser()) redirect ("index.php");

if ($_POST["user"]) {
	 $_SESSION["user"] = $_POST["user"];
	 $_SESSION["pass"] = $_POST["pass"];
	 if (!validateUser()) {
	 		$_SESSION["user"] = "";
			$_SESSION["pass"] = "";
			
			redirect("login.php","Invalid login.");
	 }
	 
	 redirect("index.php");
} else {
	 // display form
	 
	 $smarty->assign("message",$_GET["message"]);
	 
	 $smarty->display('./login.tpl');
}

?>