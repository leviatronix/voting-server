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
$result = $mysqli->query($query);

$positions = array();
$candidates = array();
$votes = array();
for ($i=0, $num=$result->num_rows; $i<$num; $i++) {
		$positions[$i] = $result->fetch_array();
		$query = "SELECT cid, cname FROM candidates WHERE pid=".$positions[$i]["pid"];
		$result2 = $mysqli->query($query);
		for ($j=0, $num2=$result2->num_rows; $j<$num2; $j++) {
				$candidates[$i][$j] = $result2->fetch_array();
				$query = "SELECT count(vid) FROM votes WHERE cid=".$candidates[$i][$j]["cid"];
				$votes[$i][$j] = $mysqli->query($query)->fetch_array()[0];
		}
		$result2->close();
}

$result->close();

$smarty->assign("positions",$positions);
$smarty->assign("candidates",$candidates);
$smarty->assign("votes",$votes);

$smarty->display('./results.tpl');

?>