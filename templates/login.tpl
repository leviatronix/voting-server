{include file="header.tpl" title="Election Administration"}

<form name="login" action="login.php" method="post">
<table>
<tr>
		<td colspan=2 align=center><b>Login</b></td>
</tr>
{if $message != ""}
<tr>
		<td colspan=2 align=center>{$message}</td>
</tr>
{/if}
<tr>
		<td>Username</td>
		<td>: <input type="text" name="user" value=""></td>
</tr>
<tr>
		<td>Password</td>
		<td>: <input type="password" name="pass" value=""></td>
</tr>
<tr>
		<td colspan=2 align=center>
		<input type="submit" name="submit" value="Login">
		</td>
</tr>
</table>
</form>

{include file="footer.tpl"}