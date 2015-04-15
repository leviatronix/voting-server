<?php /* Smarty version 2.5.0, created on 2004-04-12 14:41:14
         compiled from vote.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("header.tpl", array('title' => 'Elections'));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['action'] == 'form'): ?>
Welcome, <b><?php echo $this->_tpl_vars['name']; ?>
</b>. You may vote for any or all of the candidates listed below.
<form name="ballot" action="vote.php" method="post">
<input type="hidden" name="action" value="vote">
<input type="hidden" name="sid" value="<?php echo $this->_tpl_vars['sid']; ?>
">
<table>
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
<tr>
		<td colspan=2 align=left><b><?php echo $this->_tpl_vars['positions'][$this->_sections['position']['index']]['1']; ?>
</b></td>
</tr>
		<?php if (isset($this->_sections['candidate'])) unset($this->_sections['candidate']);
$this->_sections['candidate']['name'] = 'candidate';
$this->_sections['candidate']['loop'] = is_array($this->_tpl_vars['candidates']) ? count($this->_tpl_vars['candidates']) : max(0, (int)$this->_tpl_vars['candidates']);
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
		<?php if ($this->_tpl_vars['candidates'][$this->_sections['position']['index']][$this->_sections['candidate']['index']]['0'] > 0): ?>
		<tr>
				<td><input type="checkbox" name="<?php echo $this->_tpl_vars['candidates'][$this->_sections['position']['index']][$this->_sections['candidate']['index']]['0']; ?>
"></td>
				<td><label for="<?php echo $this->_tpl_vars['candidates'][$this->_sections['position']['index']][$this->_sections['candidate']['index']]['0']; ?>
"><?php echo $this->_tpl_vars['candidates'][$this->_sections['position']['index']][$this->_sections['candidate']['index']]['1']; ?>
</label></td>
		</tr>
		<?php endif; ?>
		<?php endfor; endif; ?>
<tr>
		<td colspan=2 height=5></td>
</tr>
<?php endfor; endif; ?>
<tr>
		<td colspan=2 align=center>
		<input type="submit" name="submit" value="Vote">
		</td>
</tr>
</table>
</form>
<?php endif; ?>
<?php if ($this->_tpl_vars['action'] == 'done'): ?>
Thank you. Your votes have been recorded.<br>
<br>
<a href="index.php">Back to main</a>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("footer.tpl", array());
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>