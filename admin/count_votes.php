<?php
# Count votes properly...

$query = "SELECT COUNT(votes.cid) AS votesFor, cname
	FROM votes
	LEFT JOIN candidates ON candidates.cid=votes.cid GROUP BY votes.cid";

$link = mysql_connect('localhost', 'root', 'schoolvoting');
mysql_select_db('vote');

$res = mysql_query($query);
while($row = mysql_fetch_assoc($res)){
	print "<b>{$row['cname']}</b> has {$row['votesFor']} votes.<br>";
}
?>