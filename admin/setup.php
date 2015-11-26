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
		$query = "INSERT INTO positions VALUES (0,'".$_POST["name"]."',".$_POST["grade"].")";
		$mysqli->query($query);
		$pid = $mysqli->insert_id;
		
		redirect("setup.php?action=editposition&pid=".$pid,"Position added.");
	} else if ($_POST["action"] == "editposition") {
		$pid = $_POST["pid"];
		$query = "UPDATE positions SET pname='".$_POST["name"]."',pgrade='".$_POST["grade"]."' WHERE pid=".$pid;
		$mysqli->query($query);
		
		$candidates = array();
		for ($i=0, $num=count($_POST["candidates"]); $i<$num; $i++) {
				if ($_POST["candidates"][$i] != "") $candidates[] = $_POST["candidates"][$i];
		}
		 
		// remove candidates and reenter them
		$query = "DELETE FROM candidates WHERE pid=".$pid;
		$mysqli->query($query);
		
		for ($i=0, $num=count($candidates); $i<$num; $i++) {
				$query = "INSERT INTO candidates VALUES (0,".$pid.",'".$candidates[$i]."')";
				$mysqli->query($query);
		}
		 
		redirect("setup.php?action=editposition&pid=".$_POST["pid"],"Position edited.");
	} else if ($_POST["action"] == "deleteposition") {
		$pid = $_POST["pid"];
		
		$query = "DELETE FROM positions WHERE pid=".$pid;
		$mysqli->query($query);
		
		$query = "SELECT cid FROM candidates WHERE pid=".$pid;
		$result = $mysqli->query($query);
		
		for ($i=0, $num=$result->num_rows; $i<$num; $i++) {
				$row = $result->fetch_row();
				$mysqli->query("DELETE FROM votes WHERE cid=".$row[0]);
		}

		$result->close();
		
		$query = "DELETE FROM candidates WHERE pid=".$pid;
		$mysqli->query($query);
		
		redirect("setup.php","Position deleted.");
	}
} elseif ($_GET["action"]) {
	if ($_GET["action"] == "editposition") {
		$pid = $_GET["pid"];
		// get data
		$query = "SELECT pname, pgrade FROM positions WHERE pid=".$pid;
		$result = $mysqli->query($query);
		$row = $result->fetch_array();
		$smarty->assign("pid",$pid);
		$smarty->assign("name",$row["pname"]);
		$smarty->assign("grade",$row["pgrade"]);

		$result->close();
		
		$query = "SELECT cname FROM candidates WHERE pid=$pid";
		$result = $mysqli->query($query);
		$data = array();
		for ($i=0, $num=$result->num_rows; $i<$num; $i++) {
				$data[$i] = $result->fetch_row();
		}

		$result->close();

		$smarty->assign("data",$data);
	}
	
	$smarty->assign("action",$_GET["action"]);
	$smarty->assign("message",$_GET["message"]);
	$smarty->display('./setup.tpl');
} else {
	// get existing positions
	$query = "SELECT pid, pname FROM positions";
	$result = $mysqli->query($query);
	
	$positions = array();
	for ($i=0, $num=$result->num_rows; $i<$num; $i++) {
			$positions[$i] = $result->fetch_row();
	}

	$result->close();
	
	$smarty->assign("positions",$positions);
	
	$smarty->display('./setup.tpl');
}
?>