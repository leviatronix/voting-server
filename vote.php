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
				 $query = "INSERT INTO votes VALUES ('',$sid,$key)";
				 mysql_query($query, $conn);
			}
	}
	
	// set svoted to 1
	$query = "UPDATE students SET svoted=1 WHERE sid=".$sid;
	mysql_query($query, $conn);
	
	$smarty->assign("action","done");
	$smarty->display("vote.tpl");
} else {
	// validate student number
  if (!$_POST["number"]) 
  	 redirect("index.php","Please enter a valid student number.");
  
  $query = "SELECT sid FROM students WHERE snumber='".$_POST["number"]."'";
  $sid = @mysql_result(mysql_query($query, $conn), 0, 0);
  if (!$sid) 
  	 redirect("index.php","Please enter a valid student number.");
  
  $query = "SELECT svoted FROM students WHERE sid=".$sid;
  if (mysql_result(mysql_query($query, $conn), 0, 0) != 0) 
  	 redirect("index.php","It appears that you have already voted.");
	// get data
	$number = $_POST["number"];
	$query = "SELECT sid, sfirst, slast, sgrade FROM students WHERE snumber=".$number;
	$row = mysql_fetch_array(mysql_query($query, $conn));
	$name = $row["sfirst"]." ".$row["slast"];
	$grade = $row["sgrade"];
	$sid = $row["sid"];
	
	$query = "SELECT pid, pname FROM positions WHERE pgrade=".$grade." OR pgrade=99";
	$result = mysql_query($query, $conn);
	
	$positions = array();
	$candidates = array();
	for ($i=0, $num=mysql_num_rows($result); $i<$num; $i++) {
			$positions[$i] = mysql_fetch_row($result);
			$query = "SELECT cid, cname FROM candidates WHERE pid=".$positions[$i][0];
			$result2 = mysql_query($query, $conn);
			
			for ($j=0, $num2=mysql_num_rows($result2); $j<$num2; $j++) {
					$candidates[$i][$j] = mysql_fetch_row($result2);
			}
	}
	
	$smarty->assign("positions",$positions);
	$smarty->assign("candidates",$candidates);
	
	$smarty->assign("name",$name);
	$smarty->assign("sid",$sid);
	
	$smarty->assign("action","form");
	
	$smarty->display('vote.tpl');
}

?>