{include file="./header.tpl" title="View Students"}

{if $action == "deleteall"}
All students have been deleted. Click <a href="import.php">here</a> to import new ones.<br>
<br>
<a href="index.php">&lt;&lt;Back</a><br>
{/if}
{if $action == ""}
<table>
<tr>
		<td width=50><b>sid</b></td>
		<td width=100><b>slast</b></td>
		<td width=100><b>sfirst</b></td>
		<td width=100><b>snumber</b></td>
		<td width=50><b>sgrade</b></td>
		<td width=50><b>svoted</b></td>
</tr>
{section name=i loop=$data}
<tr>
		<td>{$data[i].0}</td>
		<td>{$data[i].1}</td>
		<td>{$data[i].2}</td>
		<td>{$data[i].3}</td>
		<td>{$data[i].4}</td>
		<td>{$data[i].5}</td>
</tr>
{/section}
</table>
<br>
<form name="delete" action="students.php" method="post">
<input type="hidden" name="action" value="deleteall">
<input type="submit" name="submit" value="Delete all students"><br>
<br>
<a href="index.php">&lt;&lt;Back</a><br>
{/if}

{include file="./footer.tpl"}