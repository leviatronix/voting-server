<?php /* Smarty version 2.5.0, created on 2004-04-12 14:40:50
         compiled from ./setup.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("./header.tpl", array('title' => 'Election Setup'));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['action'] == ""): ?>
<b>Current positions:</b><br>
<?php if (isset($this->_sections['position'])) unset($this->_sections['position']);
$this->_sections['position']['name'] = 'position';
$this->_sections['position']['loop'] = is_array($this->_tpl_vars['positions']) ? count($this->_tpl_vars['positions']) : max(0, (int)$this->_tpl_vars['positions']);
$this->_sections['position']['show'] = true;
$this->_sections['position']['max'] = $this->_sections['position']['loop'];
$this->_sections['position']['step'] = 1;
$this->_sections['position']['start'] = $this->_sections['position']['step'] > 0 ? 0 : $this->_sections['position']['loop']-1;
if ($this->_sections['position']['show']) {
    $this->_sections['position']['total'] = $this->_sections['position']['loop'];
    if ($this->_sections['position']['total'] == 0)
        $this->_sections['position']['show'] = false;
} else
    $this->_sections['position']['total'] = 0;
if ($this->_sections['position']['show']):

            for ($this->_sections['position']['index'] = $this->_sections['position']['start'], $this->_sections['position']['iteration'] = 1;
                 $this->_sections['position']['iteration'] <= $this->_sections['position']['total'];
                 $this->_sections['position']['index'] += $this->_sections['position']['step'], $this->_sections['position']['iteration']++):
$this->_sections['position']['rownum'] = $this->_sections['position']['iteration'];
$this->_sections['position']['index_prev'] = $this->_sections['position']['index'] - $this->_sections['position']['step'];
$this->_sections['position']['index_next'] = $this->_sections['position']['index'] + $this->_sections['position']['step'];
$this->_sections['position']['first']      = ($this->_sections['position']['iteration'] == 1);
$this->_sections['position']['last']       = ($this->_sections['position']['iteration'] == $this->_sections['position']['total']);
?>
&nbsp;&nbsp;&middot;<a href="setup.php?action=editposition&pid=<?php echo $this->_tpl_vars['positions'][$this->_sections['position']['index']]['0']; ?>
"><?php echo $this->_tpl_vars['positions'][$this->_sections['position']['index']]['1']; ?>
</a><br>
<?php endfor; endif; ?>
<br>
&nbsp;&nbsp;&middot;<a href="setup.php?action=addposition">Add a position</a><br>
<br>
<a href="index.php">&lt;&lt;Back</a><br>
<?php endif; ?>
<?php if ($this->_tpl_vars['action'] == 'addposition'): ?>
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
<?php endif; ?>
<?php if ($this->_tpl_vars['action'] == 'editposition'): ?>
<form name="editposition" action="setup.php" method="post">
<input type="hidden" name="action" value="editposition">
<input type="hidden" name="pid" value="<?php echo $this->_tpl_vars['pid']; ?>
">
<table>
<tr>
		<td colspan=3 align=center><b>Edit position</b></td>
</tr>
<?php if ($this->_tpl_vars['message'] != ""): ?>
<tr>
		<td colspan=3 align=center><?php echo $this->_tpl_vars['message']; ?>
</td>
</tr>
<?php endif; ?>
<tr>
		<td>Name</td>
		<td>:&nbsp;</td>
		<td><input type="text" name="name" value="<?php echo $this->_tpl_vars['name']; ?>
"></td>
</tr>
<tr>
		<td>Grade</td>
		<td>:&nbsp;</td>
		<td><input type="text" name="grade" value="<?php echo $this->_tpl_vars['grade']; ?>
"></td>
</tr>
<tr>
		<td colspan=3 height=5></td>
</tr>
<tr>
		<td valign=top>Candidates</td>
		<td valign=top>:&nbsp;</td>
		<td valign=top>
					<table cellpadding=0 cellspacing=0>
					<?php if (isset($this->_sections['candidate'])) unset($this->_sections['candidate']);
$this->_sections['candidate']['name'] = 'candidate';
$this->_sections['candidate']['loop'] = is_array($this->_tpl_vars['data']) ? count($this->_tpl_vars['data']) : max(0, (int)$this->_tpl_vars['data']);
$this->_sections['candidate']['show'] = true;
$this->_sections['candidate']['max'] = $this->_sections['candidate']['loop'];
$this->_sections['candidate']['step'] = 1;
$this->_sections['candidate']['start'] = $this->_sections['candidate']['step'] > 0 ? 0 : $this->_sections['candidate']['loop']-1;
if ($this->_sections['candidate']['show']) {
    $this->_sections['candidate']['total'] = $this->_sections['candidate']['loop'];
    if ($this->_sections['candidate']['total'] == 0)
        $this->_sections['candidate']['show'] = false;
} else
    $this->_sections['candidate']['total'] = 0;
if ($this->_sections['candidate']['show']):

            for ($this->_sections['candidate']['index'] = $this->_sections['candidate']['start'], $this->_sections['candidate']['iteration'] = 1;
                 $this->_sections['candidate']['iteration'] <= $this->_sections['candidate']['total'];
                 $this->_sections['candidate']['index'] += $this->_sections['candidate']['step'], $this->_sections['candidate']['iteration']++):
$this->_sections['candidate']['rownum'] = $this->_sections['candidate']['iteration'];
$this->_sections['candidate']['index_prev'] = $this->_sections['candidate']['index'] - $this->_sections['candidate']['step'];
$this->_sections['candidate']['index_next'] = $this->_sections['candidate']['index'] + $this->_sections['candidate']['step'];
$this->_sections['candidate']['first']      = ($this->_sections['candidate']['iteration'] == 1);
$this->_sections['candidate']['last']       = ($this->_sections['candidate']['iteration'] == $this->_sections['candidate']['total']);
?>
					<tr>
							<td><input type="text" name="candidates[]" value="<?php echo $this->_tpl_vars['data'][$this->_sections['candidate']['index']]['0']; ?>
"></td>
					</tr>
					<?php endfor; endif; ?>
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
<input type="hidden" name="pid" value="<?php echo $this->_tpl_vars['pid']; ?>
">
<input type="hidden" name="action" value="deleteposition">
<tr>
		<td colspan=3 align=center>
		<br>
		<input type="submit" name="submit" value="Delete">
</table>
</form>
<a href="setup.php">&lt;&lt;Back</a><br>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("./footer.tpl", array());
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>