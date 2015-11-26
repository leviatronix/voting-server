<?php
/**
 * vote.php
 *
 * Page to vote and process votes
 *
 * @author Brian Rue
 * @date 11/25/03
*/

require_once './common.php';

if ($_POST["action"] == "vote") {
	$sid = $_POST["sid"];
	// post votes
	foreach ($_POST as $key => $val) {
		if (is_numeric($key) && $val != "") {
			$query = "INSERT INTO votes VALUES (0,$sid,$key)";
			$mysqli->query($query);
		}
	}
	
	// set svoted to 1
	$query = "UPDATE students SET svoted=1 WHERE sid=".$sid;
	$mysqli->query($query);
	
	$smarty->assign("action","done");
	$smarty->display("vote.tpl");
} else if ($_POST["number"]) {
	$query = "SELECT sid, sfirst, slast, sgrade, svoted FROM students WHERE snumber=".$_POST["number"];
	$result = $mysqli->query($query);
	$row = $result->fetch_array();

	$sid = $row["sid"];
	if (!$sid) 
		redirect("index.php","Please enter a valid student number.");
	
	if ($row["svoted"] != 0) 
		redirect("index.php","It appears that you have already voted.");
	// get data
	$name = $row["sfirst"]." ".$row["slast"];
	$grade = $row["sgrade"];
	
	$result->close();

	$query = "SELECT pid, pname FROM positions WHERE pgrade=".$grade." OR pgrade=99";
	$result = $mysqli->query($query);
	
	$positions = array();
	$candidates = array();
	for ($i=0, $num=$result->num_rows; $i<$num; $i++) {
		$positions[$i] = $result->fetch_row();
		$query = "SELECT cid, cname FROM candidates WHERE pid=".$positions[$i][0];
		$result2 = $mysqli->query($query);
		
		for ($j=0, $num2=$result2->num_rows; $j<$num2; $j++) {
			$candidates[$i][$j] = $result2->fetch_row();
		}
		$result2->close();
	}

	$result->close();
	
	$smarty->assign("positions",$positions);
	$smarty->assign("candidates",$candidates);
	
	$smarty->assign("name",$name);
	$smarty->assign("sid",$sid);
	
	$smarty->assign("action","form");
	
	$smarty->display('vote.tpl');
} else {
	// validate student number
	redirect("index.php","Please enter a valid student number.");
}

?>