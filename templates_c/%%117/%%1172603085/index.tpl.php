<?php /* Smarty version 2.5.0, created on 2004-04-12 14:30:49
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("header.tpl", array('title' => 'Elections'));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form action="vote.php" method="post">
<?php if ($this->_tpl_vars['message'] != ""): ?>
<b><?php echo $this->_tpl_vars['message']; ?>
</b><br><br>
<?php endif; ?>
Student number: <input type="text" name="number" value="">
<input type="submit" name="submit" value="Go">
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("footer.tpl", array());
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>