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
	 mysql_query($query, $conn);
	 
	 $query = "DELETE FROM votes";
	 mysql_query($query, $conn);
	 
	 $smarty->assign("action",$_POST["action"]);
	 $smarty->display('./students.tpl');
}
// get data
$query = "SELECT sid, slast, sfirst, snumber, sgrade, svoted FROM students";
$result = mysql_query($query, $conn);

$data = array();
for ($i=0, $num=mysql_num_rows($result); $i<$num; $i++) {
		$data[$i] = mysql_fetch_array($result);
}

$smarty->assign("data",$data);

$smarty->display('./students.tpl');
?>