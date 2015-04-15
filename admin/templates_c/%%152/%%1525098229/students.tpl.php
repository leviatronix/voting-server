<?php /* Smarty version 2.5.0, created on 2004-04-12 14:35:01
         compiled from ./students.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("./header.tpl", array('title' => 'View Students'));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['action'] == 'deleteall'): ?>
All students have been deleted. Click <a href="import.php">here</a> to import new ones.<br>
<br>
<a href="index.php">&lt;&lt;Back</a><br>
<?php endif; ?>
<?php if ($this->_tpl_vars['action'] == ""): ?>
<table>
<tr>
		<td width=50><b>sid</b></td>
		<td width=100><b>slast</b></td>
		<td width=100><b>sfirst</b></td>
		<td width=100><b>snumber</b></td>
		<td width=50><b>sgrade</b></td>
		<td width=50><b>svoted</b></td>
</tr>
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($this->_tpl_vars['data']) ? count($this->_tpl_vars['data']) : max(0, (int)$this->_tpl_vars['data']);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<tr>
		<td><?php echo $this->_tpl_vars['data'][$this->_sections['i']['index']]['0']; ?>
</td>
		<td><?php echo $this->_tpl_vars['data'][$this->_sections['i']['index']]['1']; ?>
</td>
		<td><?php echo $this->_tpl_vars['data'][$this->_sections['i']['index']]['2']; ?>
</td>
		<td><?php echo $this->_tpl_vars['data'][$this->_sections['i']['index']]['3']; ?>
</td>
		<td><?php echo $this->_tpl_vars['data'][$this->_sections['i']['index']]['4']; ?>
</td>
		<td><?php echo $this->_tpl_vars['data'][$this->_sections['i']['index']]['5']; ?>
</td>
</tr>
<?php endfor; endif; ?>
</table>
<br>
<form name="delete" action="students.php" method="post">
<input type="hidden" name="action" value="deleteall">
<input type="submit" name="submit" value="Delete all students"><br>
<br>
<a href="index.php">&lt;&lt;Back</a><br>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("./footer.tpl", array());
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>