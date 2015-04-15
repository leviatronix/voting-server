<?php
/**
 * admin/results.php
 *
 * Page for admins to view current results of the election
 *
 * @author Brian Rue
 * @date 11/25/03
*/

require_once './common.php';

if (!validateUser()) redirect("login.php","You need to log in.");

// get data
$query = "SELECT pid, pname, pgrade FROM positions";
$result = mysql_query($query, $conn);

$positions = array();
$candidates = array();
$votes = array();
for ($i=0, $num=mysql_num_rows($result); $i<$num; $i++) {
		$positions[$i] = mysql_fetch_array($result);
		$query = "SELECT cid, cname FROM candidates WHERE pid=".$positions[$i]["pid"];
		$result2 = mysql_query($query, $conn);
		for ($j=0, $num2=mysql_num_rows($result2); $j<$num2; $j++) {
				$candidates[$i][$j] = mysql_fetch_array($result2);
				$query = "SELECT count(vid) FROM votes WHERE cid=".$candidates[$i][$j]["cid"];
				$votes[$i][$j] = mysql_result(mysql_query($query, $conn), 0, 0);
		}
}

$smarty->assign("positions",$positions);
$smarty->assign("candidates",$candidates);
$smarty->assign("votes",$votes);

$smarty->display('./results.tpl');

?>

?>