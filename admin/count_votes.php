<?php
# Count votes properly...

$query = "SELECT COUNT(votes.cid) AS votesFor, cname
	FROM votes
	LEFT JOIN candidates ON candidates.cid=votes.cid GROUP BY votes.cid";

$link = new mysqli('localhost', 'root', 'schoolvoting', 'vote');

$res = $link->query($query);
while($row = $res->fetch_assoc()){
	print "<b>{$row['cname']}</b> has {$row['votesFor']} votes.<br>";
}
$res->close();
?>