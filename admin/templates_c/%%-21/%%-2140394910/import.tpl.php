<?php /* Smarty version 2.5.0, created on 2004-04-12 14:48:46
         compiled from import.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("./header.tpl", array('title' => "Election Administration - Import Students"));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['action'] == ""): ?>
<form name="import" action="import.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="action" value="import">
Import CSV file: <input type="file" name="import"><br>
<input type="submit" name="submit" value="Import"><br>
<br>
<a href="index.php">&lt;&lt;Back</a><br>
</form>
<?php endif; ?>
<?php if ($this->_tpl_vars['action'] == 'done'): ?>
<?php echo $this->_tpl_vars['count']; ?>
 students have been added to the database. Click <a href="students.php">here</a> to view all students.<br>
<br>
<a href="import.php">&lt;&lt;Back</a><br>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("./footer.tpl", array());
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>