<?php
/**
 * admin/index.php
 *
 * Index page for admins - displays links to the tools
 * 
 * @author Brian Rue
 * @date 11/25/03
*/

require_once 'common.php';


if (!validateUser()) redirect("login.php","You need to log in.");

$smarty->display('./index.tpl');

?>
