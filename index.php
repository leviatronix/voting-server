<?php
/**
 * index.php
 * 
 * Login page for students
 *
 * @author Brian Rue
 * @date 11/25/03
*/

require_once './common.php';

$smarty->assign("message",$_GET["message"]);
$smarty->display('index.tpl');

?>