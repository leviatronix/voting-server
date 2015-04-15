{include file="./header.tpl" title="Election Administration - Import Students"}

{if $action==""}
<form name="import" action="import.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="import">
Import CSV file: <input type="file" name="import"><br>
<input type="submit" name="submit" value="Import"><br>
<br>
<a href="index.php">&lt;&lt;Back</a><br>
</form>
{/if}
{if $action=="done"}
{$count} students have been added to the database. Click <a href="students.php">here</a> to view all students.<br>
<br>
<a href="import.php">&lt;&lt;Back</a><br>
{/if}

{include file="./footer.tpl"}