<?php
/**
 * admin/students.php
 *
 * View all students (the contents of the students table)
 *
 * @author Brian Rue
 * @date 11/25/03
*/

require './common.php';

if (!validateUser()) redirect("login.php","You need to log in.");

if ($_POST["action"] == "deleteall") {
	$query = "DELETE FROM students";
	$mysqli->query($query);
	
	$query = "DELETE FROM votes";
	$mysqli->query($query);
	
	$smarty->assign("action",$_POST["action"]);
	$smarty->display('./students.tpl');
}
// get data
$query = "SELECT sid, slast, sfirst, snumber, sgrade, svoted FROM students";
$result = $mysqli->query($query);

$data = array();
for ($i=0, $num=$result->num_rows; $i<$num; $i++) {
	$data[$i] = $result->fetch_array();
}

$result->close();

$smarty->assign("data",$data);

$smarty->display('./students.tpl');
?>