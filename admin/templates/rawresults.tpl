{include file="./header.tpl" title="Raw Results"}

<table>
<tr>
		<td width=100><b>sid</b></td>
		<td><b>cid</b></td>
</tr>
{section name=i loop=$data}
<tr>
		<td>{$data[i].0}</td>
		<td>{$data[i].1}</td>
</tr>
{/section}
</table>

<br>
<a href="index.php">&lt;&lt;Back</a><br>

{include file="./footer.tpl"}