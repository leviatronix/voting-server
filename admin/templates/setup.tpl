{include file="./header.tpl" title="Election Setup"}

{if $action == ""}
<b>Current positions:</b><br>
{section name=position loop=$positions}
&nbsp;&nbsp;&middot;<a href="setup.php?action=editposition&pid={$positions[position].0}">{$positions[position].1}</a><br>
{/section}
<br>
&nbsp;&nbsp;&middot;<a href="setup.php?action=addposition">Add a position</a><br>
<br>
<a href="index.php">&lt;&lt;Back</a><br>
{/if}
{if $action == "addposition"}
<form name="addposition" action="setup.php" method="post">
<input type="hidden" name="action" value="addposition">
<table>
<tr>
		<td colspan=2 align=center><b>Add position</b></td>
</tr>
<tr>
		<td>Position name</td>
		<td>: <input type="text" name="name" value=""></td>
</tr>
<tr>
		<td>Grade</td>
		<td>: <input type="text" name="grade" value="" maxlength=2 size=2> (Enter 99 if ASB candidate)</td>
</tr>
<tr>
		<td colspan=2 align=center>
		<input type="submit" name="submit" value="Add">
		</td>
</tr>
</table>
</form>
<a href="setup.php">&lt;&lt;Back</a><br>
{/if}
{if $action == "editposition"}
<form name="editposition" action="setup.php" method="post">
<input type="hidden" name="action" value="editposition">
<input type="hidden" name="pid" value="{$pid}">
<table>
<tr>
		<td colspan=3 align=center><b>Edit position</b></td>
</tr>
{if $message != ""}
<tr>
		<td colspan=3 align=center>{$message}</td>
</tr>
{/if}
<tr>
		<td>Name</td>
		<td>:&nbsp;</td>
		<td><input type="text" name="name" value="{$name}"></td>
</tr>
<tr>
		<td>Grade</td>
		<td>:&nbsp;</td>
		<td><input type="text" name="grade" value="{$grade}"></td>
</tr>
<tr>
		<td colspan=3 height=5></td>
</tr>
<tr>
		<td valign=top>Candidates</td>
		<td valign=top>:&nbsp;</td>
		<td valign=top>
					<table cellpadding=0 cellspacing=0>
					{section name=candidate loop=$data}
					<tr>
							<td><input type="text" name="candidates[]" value="{$data[candidate].0}"></td>
					</tr>
					{/section}
					<tr>
							<td><input type="text" name="candidates[]" value=""></td>
					</tr>
					<tr>
							<td><input type="text" name="candidates[]" value=""></td>
					</tr>
					<tr>
							<td><input type="text" name="candidates[]" value=""></td>
					</tr>
					<tr>
							<td><input type="text" name="candidates[]" value=""></td>
					</tr>
					<tr>
							<td><input type="text" name="candidates[]" value=""></td>
					</tr>
					</table>
		</td>
</tr>
<tr>
		<td colspan=3 align=center>
		<input type="submit" name="submit" value="Save">
		</td>
</tr>
</form>
<form name="delete" action="setup.php" method="post" onsubmit="if (!confirm('Are you sure you want to delete this candidate?')) return false;">
<input type="hidden" name="pid" value="{$pid}">
<input type="hidden" name="action" value="deleteposition">
<tr>
		<td colspan=3 align=center>
		<br>
		<input type="submit" name="submit" value="Delete">
</table>
</form>
<a href="setup.php">&lt;&lt;Back</a><br>
{/if}
{include file="./footer.tpl"}