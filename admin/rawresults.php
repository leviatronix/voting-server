<?php
/**
 * admin/rawresults.php
 *
 * View raw data from the votes table
 *
 * @author Brian Rue
 * @date 11/25/03
*/

require_once './common.php';

if (!validateUser()) redirect("login.php","You need to log in.");

// get data
$query = "SELECT sid, cid FROM votes";
$result = $mysqli->query($query);

$data = array();
for ($i=0, $num=$result->num_rows; $i<$num; $i++) {
		$data[$i] = $result->fetch_array();
}

$result->close();

$smarty->assign("data",$data);
$smarty->display('rawresults.tpl');

?>