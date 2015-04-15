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
$result = mysql_query($query, $conn);

$data = array();
for ($i=0, $num=mysql_num_rows($result); $i<$num; $i++) {
		$data[$i] = mysql_fetch_array($result);
}

$smarty->assign("data",$data);
$smarty->display('rawresults.tpl');

?>