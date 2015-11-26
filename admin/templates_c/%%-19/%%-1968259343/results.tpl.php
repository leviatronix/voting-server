<?php /* Smarty version 2.5.0, created on 2004-04-27 14:37:31
         compiled from ./results.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("./header.tpl", array('title' => 'Elections Results'));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table>

<tr>
		<td>
		<b>Current Results</b>
		</td>
</tr>
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
		<td>
		<table>
		<tr>
				<td valign=top>Position</td>
				<td valign=top>: </td>
				<td valign=top><?php echo $this->_tpl_vars['positions'][$this->_sections['position']['index']]['1']; ?>
</td>
		</tr>
		<tr>
				<td valign=top>Grade</td>
				<td valign=top>: </td>
				<td valign=top><?php echo $this->_tpl_vars['positions'][$this->_sections['position']['index']]['2']; ?>
</td>
		</tr>
		<tr>
				<td valign=top>Candidates</td>
				<td valign=top>: </td>
				<td valign=top>
				<table>
				<?php if (isset($this->_sections['candidate'])) unset($this->_sections['candidate']);
$this->_sections['candidate']['name'] = 'candidate';
$this->_sections['candidate']['loop'] = is_array($this->_tpl_vars['candidates'][$this->_sections['position']['index']]) ? count($this->_tpl_vars['candidates'][$this->_sections['position']['index']]) : max(0, (int)$this->_tpl_vars['candidates'][$this->_sections['position']['index']]);
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
						<td><?php echo $this->_tpl_vars['candidates'][$this->_sections['position']['index']][$this->_sections['candidate']['index']]['1']; ?>
: <?php echo $this->_tpl_vars['votes'][$this->_sections['position']['index']][$this->_sections['candidate']['index']]['0']; ?>
 votes</td>
				</tr>
				<?php endif; ?>
				<?php endfor; endif; ?>
				</table>
				</td>
		</tr>
		</table>
		</td>
</tr>
<tr>
		<td height=5></td>
</tr>
<?php endfor; endif; ?>

</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include("./footer.tpl", array());
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>