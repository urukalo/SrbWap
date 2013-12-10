<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<hr />
<br />

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo (isset($this->_rootref['MESSAGE_TITLE'])) ? $this->_rootref['MESSAGE_TITLE'] : ''; ?></th>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr class="row1"> 
		<td align="center"><p class="gen"><?php echo (isset($this->_rootref['MESSAGE_TEXT'])) ? $this->_rootref['MESSAGE_TEXT'] : ''; ?></p></td>
	</tr>
</table>
<hr />
<br clear="all" />

<?php $this->_tpl_include('breadcrumbs.html'); ?>

<hr />

<?php $this->_tpl_include('overall_footer.html'); ?>