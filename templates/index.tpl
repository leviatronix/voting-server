{include file="header.tpl" title="Elections"}

<form action="vote.php" method="post">
{if $message != ""}
<b>{$message}</b><br><br>
{/if}
Student number: <input type="text" name="number" value="">
<input type="submit" name="submit" value="Go">
</form>

{include file="footer.tpl"}