{include file="header.tpl" title="Elections"}

{if $action=="form"}
Welcome, <b>{$name}</b>. You may vote for any or all of the candidates listed below.
<form name="ballot" action="vote.php" method="post">
<input type="hidden" name="action" value="vote">
<input type="hidden" name="sid" value="{$sid}">
<table>
{section name=position loop=$positions}
<tr>
		<td colspan=2 align=left><b>{$positions[position].1}</b></td>
</tr>
		{section name=candidate loop=$candidates[position]}
		{if $candidates[position][candidate].0 > 0}
		<tr>
				<td><input type="radio" name="{$candidates[position][candidate].0}"></td>
				<td><label for="{$candidates[position][candidate].0}">{$candidates[position][candidate].1}</label></td>
		</tr>
		{/if}
		{/section}
<tr>
		<td colspan=2 height=5></td>
</tr>
{/section}
<tr>
		<td colspan=2 align=center>
		<input type="submit" name="submit" value="Vote">
		</td>
</tr>
</table>
</form>
{/if}
{if $action=="done"}
Thank you. Your votes have been recorded.<br>
<br>
<a href="index.php">Back to main</a>
{/if}

{include file="footer.tpl"}
