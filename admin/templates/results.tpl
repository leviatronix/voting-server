{include file="./header.tpl" title="Elections Results"}

<table>
<tr>
		<td>
		<b>Current Results</b>
		</td>
</tr>
{section name=position loop=$positions}
<tr>
		<td>
		<table>
		<tr>
				<td valign=top>Position</td>
				<td valign=top>: </td>
				<td valign=top>{$positions[position].1}</td>
		</tr>
		<tr>
				<td valign=top>Grade</td>
				<td valign=top>: </td>
				<td valign=top>{$positions[position].2}</td>
		</tr>
		<tr>
				<td valign=top>Candidates</td>
				<td valign=top>: </td>
				<td valign=top>
				<table>
				{section name=candidate loop=$candidates}
				{if $candidates[position][candidate].0 > 0}
				<tr>
						<td>{$candidates[position][candidate].1}: asdf {$votes[position][candidate].0} votes</td>
				</tr>
				{/if}
				{/section}
				</table>
				</td>
		</tr>
		</table>
		</td>
</tr>
<tr>
		<td height=5></td>
</tr>
{/section}

</table>

{include file="./footer.tpl"}