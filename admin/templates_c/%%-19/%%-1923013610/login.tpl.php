<?php /* Smarty version 2.5.0, created on 2004-04-12 14:33:42
         compiled from ./login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("./header.tpl", array('title' => 'Election Administration'));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<form name="login" action="login.php" method="post">
<table>
<tr>
		<td colspan=2 align=center><b>Login</b></td>
</tr>
<?php if ($this->_tpl_vars['message'] != ""): ?>
<tr>
		<td colspan=2 align=center><?php echo $this->_tpl_vars['message']; ?>
</td>
</tr>
<?php endif; ?>
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

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("./footer.tpl", array());
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>