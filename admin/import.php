<?php
/**
 * import.php
 *
 * Import students from a CSV file
 *
 * @author Brian Rue
 * @date 11/25/03
*/

error_reporting(E_ALL);

require_once './common.php';

if (!validateUser()) redirect("login.php","You need to log in.");

if ($_POST["action"] == "import") {
   $lastname_index = 0;
   $firstname_index = 1;
   $number_index = 2;
   $grade_index = 3;
	 
	 $handle = fopen($_FILES["import"]["tmp_name"],"r");
	 $lines = file($_FILES["import"]["tmp_name"]);
	 
	 $count = 0;
	 for ($i=0, $num=count($lines); $i<$num; $i++) {
	 		 $words = explode("\t",$lines[$i]);
			 for ($j=0, $num2=count($words); $j<$num2; $j++) {
				$words[$j] = trim($words[$j]);
			 }
			 $query = "INSERT INTO students VALUES ('','".$words[$lastname_index]."','".$words[$firstname_index]."','".$words[$number_index]."','".$words[$grade_index]."',0)";
	 		 $mysqli->query($query);
			 if (!$mysqli->error) 
			 	$count++;
			 else { 
			 	print $mysqli->error();
			 	print $query;
			 	print " <br>";
			 }
	 }
	 
	 $smarty->assign("count",$count);
	 $smarty->assign("action","done");
}
$smarty->display('import.tpl');

?>