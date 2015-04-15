<?php
/**
 * setup.php
 *
 * Set up an election
 * All set up should be completed BEFORE the election begins, because editing it
 * may, and likely will, mess up the data.
 *
 * @author Brian Rue
 * @date 11/25/03
*/

require_once './common.php';

if ($_POST["action"]) {
	if ($_POST["action"] == "addposition") {
		 $query = "INSERT INTO positions VALUES ('','".$_POST["name"]."',".$_POST["grade"].")";
		 mysql_query($query, $conn);
		 $pid = mysql_insert_id($conn);
		 
		 redirect("setup.php?action=editposition&pid=".$pid,"Position added.");
	} else if ($_POST["action"] == "editposition") {
		 $pid = $_POST["pid"];
		 $query = "UPDATE positions SET pname='".$_POST["name"]."',pgrade='".$_POST["grade"]."' WHERE pid=".$pid;
		 mysql_query($query, $conn);
		 
		 $candidates = array();
		 for ($i=0, $num=count($_POST["candidates"]); $i<$num; $i++) {
		 		 if ($_POST["candidates"][$i] != "") $candidates[] = $_POST["candidates"][$i];
		 }
		 
		 // remove candidates and reenter them
		 $query = "DELETE FROM candidates WHERE pid=".$pid;
		 mysql_query($query, $conn);
		 
		 for ($i=0, $num=count($candidates); $i<$num; $i++) {
		 		 $query = "INSERT INTO candidates VALUES ('',".$pid.",'".$candidates[$i]."')";
				 mysql_query($query, $conn);
		 }
		 
		 redirect("setup.php?action=editposition&pid=".$_POST["pid"],"Position edited.");
	} else if ($_POST["action"] == "deleteposition") {
		 $pid = $_POST["pid"];
		 
		 $query = "DELETE FROM positions WHERE pid=".$pid;
		 mysql_query($query, $conn);
		 
		 $query = "SELECT cid FROM candidates WHERE pid=".$pid;
		 $result = mysql_query($query, $conn);
		 
		 for ($i=0, $num=mysql_num_rows($result); $i<$num; $i++) {
		 		 $row = mysql_fetch_row($result);
		 		 mysql_query("DELETE FROM votes WHERE cid=".$row[0], $conn);
		 }
		 
		 $query = "DELETE FROM candidates WHERE pid=".$pid;
		 mysql_query($query, $conn);
		 
		 redirect("setup.php","Position deleted.");
	}
} elseif ($_GET["action"]) {
	if ($_GET["action"] == "editposition") {
		 $pid = $_GET["pid"];
		 // get data
		 $query = "SELECT pname, pgrade FROM positions WHERE pid=".$pid;
		 $row = mysql_fetch_array(mysql_query($query, $conn));
		 $smarty->assign("pid",$pid);
		 $smarty->assign("name",$row["pname"]);
		 $smarty->assign("grade",$row["pgrade"]);
		 
		 $query = "SELECT cname FROM candidates WHERE pid=$pid";
		 $result = mysql_query($query, $conn);
		 $data = array();
		 for ($i=0, $num=mysql_num_rows($result); $i<$num; $i++) {
		 		 $data[$i] = mysql_fetch_row($result);
		 }
		 $smarty->assign("data",$data);
	}
	
	$smarty->assign("action",$_GET["action"]);
	$smarty->assign("message",$_GET["message"]);
	$smarty->display('./setup.tpl');
} else {
	// get existing positions
	$query = "SELECT pid, pname FROM positions";
	$result = mysql_query($query, $conn);
	
	$positions = array();
	for ($i=0, $num=mysql_num_rows($result); $i<$num; $i++) {
			$positions[$i] = mysql_fetch_row($result);
	}
	$smarty->assign("positions",$positions);
	
	$smarty->display('./setup.tpl');
}
?>