<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('ucp_header.html'); ?>


<script type="text/javascript">
// <![CDATA[
	/**
	* Set display of page element
	* s[-1,0,1] = hide,toggle display,show
	*/
	function dE(n,s)
	{
		var e = document.getElementById(n);
		if (!s)
		{
			s = (e.style.display == '') ? -1 : 1;
		}
		e.style.display = (s == 1) ? 'block' : 'none';
	}

	var default_dateformat = '<?php echo (isset($this->_rootref['A_DEFAULT_DATEFORMAT'])) ? $this->_rootref['A_DEFAULT_DATEFORMAT'] : ''; ?>';
// ]]>
</script>

<hr />
<br />

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_TITLE'])) ? $this->_rootref['L_TITLE'] : ((isset($user->lang['TITLE'])) ? $user->lang['TITLE'] : '{ TITLE }')); ?></th>
	</tr>
</table>

<?php if ($this->_rootref['ERROR']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="cat" align="center"><span class="gensmall error"><?php echo (isset($this->_rootref['ERROR'])) ? $this->_rootref['ERROR'] : ''; ?></span></td>
	</tr>
</table>
<?php } ?>


<hr />
<table cellspacing="0">
	<tr> 
		<td class="row1"><b class="genmed"><?php echo ((isset($this->_rootref['L_SHOW_EMAIL'])) ? $this->_rootref['L_SHOW_EMAIL'] : ((isset($user->lang['SHOW_EMAIL'])) ? $user->lang['SHOW_EMAIL'] : '{ SHOW_EMAIL }')); ?>:</b><br />
			<input type="radio" class="radio" name="viewemail" value="1"<?php if ($this->_rootref['S_VIEW_EMAIL']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></span>&nbsp;&nbsp;
			<input type="radio" class="radio" name="viewemail" value="0"<?php if (! $this->_rootref['S_VIEW_EMAIL']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></span></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr> 
		<td class="row2"><b class="genmed"><?php echo ((isset($this->_rootref['L_ADMIN_EMAIL'])) ? $this->_rootref['L_ADMIN_EMAIL'] : ((isset($user->lang['ADMIN_EMAIL'])) ? $user->lang['ADMIN_EMAIL'] : '{ ADMIN_EMAIL }')); ?>:</b><br />
			<input type="radio" class="radio" name="massemail" value="1"<?php if ($this->_rootref['S_MASS_EMAIL']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></span>&nbsp;&nbsp;
			<input type="radio" class="radio" name="massemail" value="0"<?php if (! $this->_rootref['S_MASS_EMAIL']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></span></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr> 
		<td class="row1"><b class="genmed"><?php echo ((isset($this->_rootref['L_ALLOW_PM'])) ? $this->_rootref['L_ALLOW_PM'] : ((isset($user->lang['ALLOW_PM'])) ? $user->lang['ALLOW_PM'] : '{ ALLOW_PM }')); ?>:</b><br />
			<input type="radio" class="radio" name="allowpm" value="1"<?php if ($this->_rootref['S_ALLOW_PM']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></span>&nbsp;&nbsp;
			<input type="radio" class="radio" name="allowpm" value="0"<?php if (! $this->_rootref['S_ALLOW_PM']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></span><br />
			<span class="gensmall"><?php echo ((isset($this->_rootref['L_ALLOW_PM_EXPLAIN'])) ? $this->_rootref['L_ALLOW_PM_EXPLAIN'] : ((isset($user->lang['ALLOW_PM_EXPLAIN'])) ? $user->lang['ALLOW_PM_EXPLAIN'] : '{ ALLOW_PM_EXPLAIN }')); ?></span></td>
	</tr>
</table>

<?php if ($this->_rootref['S_CAN_HIDE_ONLINE']) {  ?>

<hr />
<table cellspacing="0">
	<tr> 
		<td class="row2"><b class="genmed"><?php echo ((isset($this->_rootref['L_HIDE_ONLINE'])) ? $this->_rootref['L_HIDE_ONLINE'] : ((isset($user->lang['HIDE_ONLINE'])) ? $user->lang['HIDE_ONLINE'] : '{ HIDE_ONLINE }')); ?>:</b><br />
			<input type="radio" class="radio" name="hideonline" value="1"<?php if ($this->_rootref['S_HIDE_ONLINE']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></span>&nbsp;&nbsp;
			<input type="radio" class="radio" name="hideonline" value="0"<?php if (! $this->_rootref['S_HIDE_ONLINE']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></span><br />
			<span class="gensmall"><?php echo ((isset($this->_rootref['L_HIDE_ONLINE_EXPLAIN'])) ? $this->_rootref['L_HIDE_ONLINE_EXPLAIN'] : ((isset($user->lang['HIDE_ONLINE_EXPLAIN'])) ? $user->lang['HIDE_ONLINE_EXPLAIN'] : '{ HIDE_ONLINE_EXPLAIN }')); ?></span></td>
	</tr>
</table>
<?php } if ($this->_rootref['S_SELECT_NOTIFY']) {  ?>

<hr />
<table cellspacing="0">
	<tr> 
		<td class="row1"><b class="genmed"><?php echo ((isset($this->_rootref['L_NOTIFY_METHOD'])) ? $this->_rootref['L_NOTIFY_METHOD'] : ((isset($user->lang['NOTIFY_METHOD'])) ? $user->lang['NOTIFY_METHOD'] : '{ NOTIFY_METHOD }')); ?>:</b><br />
			<input type="radio" class="radio" name="notifymethod" value="0"<?php if ($this->_rootref['S_NOTIFY_EMAIL']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_NOTIFY_METHOD_EMAIL'])) ? $this->_rootref['L_NOTIFY_METHOD_EMAIL'] : ((isset($user->lang['NOTIFY_METHOD_EMAIL'])) ? $user->lang['NOTIFY_METHOD_EMAIL'] : '{ NOTIFY_METHOD_EMAIL }')); ?></span>&nbsp;&nbsp;
			<input type="radio" class="radio" name="notifymethod" value="1"<?php if ($this->_rootref['S_NOTIFY_IM']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_NOTIFY_METHOD_IM'])) ? $this->_rootref['L_NOTIFY_METHOD_IM'] : ((isset($user->lang['NOTIFY_METHOD_IM'])) ? $user->lang['NOTIFY_METHOD_IM'] : '{ NOTIFY_METHOD_IM }')); ?></span>&nbsp;&nbsp;
			<input type="radio" class="radio" name="notifymethod" value="2"<?php if ($this->_rootref['S_NOTIFY_BOTH']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_NOTIFY_METHOD_BOTH'])) ? $this->_rootref['L_NOTIFY_METHOD_BOTH'] : ((isset($user->lang['NOTIFY_METHOD_BOTH'])) ? $user->lang['NOTIFY_METHOD_BOTH'] : '{ NOTIFY_METHOD_BOTH }')); ?></span><br />
			<span class="gensmall"><?php echo ((isset($this->_rootref['L_NOTIFY_METHOD_EXPLAIN'])) ? $this->_rootref['L_NOTIFY_METHOD_EXPLAIN'] : ((isset($user->lang['NOTIFY_METHOD_EXPLAIN'])) ? $user->lang['NOTIFY_METHOD_EXPLAIN'] : '{ NOTIFY_METHOD_EXPLAIN }')); ?></span></td>
	</tr>
</table>
<?php } ?>


<hr />
<table cellspacing="0">
	<tr> 
		<td class="row2"><b class="genmed"><?php echo ((isset($this->_rootref['L_NOTIFY_ON_PM'])) ? $this->_rootref['L_NOTIFY_ON_PM'] : ((isset($user->lang['NOTIFY_ON_PM'])) ? $user->lang['NOTIFY_ON_PM'] : '{ NOTIFY_ON_PM }')); ?>:</b><br />
			<input type="radio" class="radio" name="notifypm" value="1"<?php if ($this->_rootref['S_NOTIFY_PM']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></span>&nbsp;&nbsp;
			<input type="radio" class="radio" name="notifypm" value="0"<?php if (! $this->_rootref['S_NOTIFY_PM']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></span></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr> 
		<td class="row1"><b class="genmed"><?php echo ((isset($this->_rootref['L_POPUP_ON_PM'])) ? $this->_rootref['L_POPUP_ON_PM'] : ((isset($user->lang['POPUP_ON_PM'])) ? $user->lang['POPUP_ON_PM'] : '{ POPUP_ON_PM }')); ?>:</b><br />
			<input type="radio" class="radio" name="popuppm" value="1"<?php if ($this->_rootref['S_POPUP_PM']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></span>&nbsp;&nbsp;
			<input type="radio" class="radio" name="popuppm" value="0"<?php if (! $this->_rootref['S_POPUP_PM']) {  ?> checked="checked"<?php } ?> /><span class="genmed"><?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></span></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row2"><b class="genmed"><?php echo ((isset($this->_rootref['L_BOARD_LANGUAGE'])) ? $this->_rootref['L_BOARD_LANGUAGE'] : ((isset($user->lang['BOARD_LANGUAGE'])) ? $user->lang['BOARD_LANGUAGE'] : '{ BOARD_LANGUAGE }')); ?>:</b><br />
			<select name="lang"><?php echo (isset($this->_rootref['S_LANG_OPTIONS'])) ? $this->_rootref['S_LANG_OPTIONS'] : ''; ?></select></td>
	</tr>
</table>

<?php if ($this->_rootref['S_STYLE_OPTIONS']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row1"><b class="genmed"><?php echo ((isset($this->_rootref['L_BOARD_STYLE'])) ? $this->_rootref['L_BOARD_STYLE'] : ((isset($user->lang['BOARD_STYLE'])) ? $user->lang['BOARD_STYLE'] : '{ BOARD_STYLE }')); ?>:</b><br />
			<select name="style"><?php echo (isset($this->_rootref['S_STYLE_OPTIONS'])) ? $this->_rootref['S_STYLE_OPTIONS'] : ''; ?></select></td>
	</tr>
</table>
<?php } ?>


<hr />
<table cellspacing="0">
<tr>
	<td class="row2"><b class="genmed"><?php echo ((isset($this->_rootref['L_BOARD_TIMEZONE'])) ? $this->_rootref['L_BOARD_TIMEZONE'] : ((isset($user->lang['BOARD_TIMEZONE'])) ? $user->lang['BOARD_TIMEZONE'] : '{ BOARD_TIMEZONE }')); ?>:</b><br />
		<select id="tz" name="tz"><?php echo (isset($this->_rootref['S_TZ_OPTIONS'])) ? $this->_rootref['S_TZ_OPTIONS'] : ''; ?></select></td>
</tr>
</table>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row1"><b class="genmed"><?php echo ((isset($this->_rootref['L_BOARD_DST'])) ? $this->_rootref['L_BOARD_DST'] : ((isset($user->lang['BOARD_DST'])) ? $user->lang['BOARD_DST'] : '{ BOARD_DST }')); ?>:</b><br />
			<input type="radio" class="radio" name="dst" value="1"<?php if ($this->_rootref['S_DST']) {  ?> checked="checked"<?php } ?> /> <span class="genmed"><?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?></span>&nbsp;&nbsp;
			<input type="radio" class="radio" name="dst" value="0"<?php if (! $this->_rootref['S_DST']) {  ?> checked="checked"<?php } ?> /> <span class="genmed"><?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></span></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row2"><b class="genmed"><?php echo ((isset($this->_rootref['L_BOARD_DATE_FORMAT'])) ? $this->_rootref['L_BOARD_DATE_FORMAT'] : ((isset($user->lang['BOARD_DATE_FORMAT'])) ? $user->lang['BOARD_DATE_FORMAT'] : '{ BOARD_DATE_FORMAT }')); ?>:</b><br />
			<select name="dateoptions" id="dateoptions" onchange="if(this.value=='custom'){dE('custom_date',1);}else{dE('custom_date',-1);} if (this.value == 'custom') { document.getElementById('dateformat').value = default_dateformat; } else { document.getElementById('dateformat').value = this.value; }">
			<?php echo (isset($this->_rootref['S_DATEFORMAT_OPTIONS'])) ? $this->_rootref['S_DATEFORMAT_OPTIONS'] : ''; ?>

		</select>
		<div id="custom_date"<?php if (! $this->_rootref['S_CUSTOM_DATEFORMAT']) {  ?> style="display:none;"<?php } ?>><input type="text" name="dateformat" id="dateformat" value="<?php echo (isset($this->_rootref['DATE_FORMAT'])) ? $this->_rootref['DATE_FORMAT'] : ''; ?>" maxlength="30" class="post" style="margin-top: 3px;" /></div><br />
			<span class="gensmall"><?php echo ((isset($this->_rootref['L_BOARD_DATE_FORMAT_EXPLAIN'])) ? $this->_rootref['L_BOARD_DATE_FORMAT_EXPLAIN'] : ((isset($user->lang['BOARD_DATE_FORMAT_EXPLAIN'])) ? $user->lang['BOARD_DATE_FORMAT_EXPLAIN'] : '{ BOARD_DATE_FORMAT_EXPLAIN }')); ?></span></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr>
		<td class="cat" align="center"><?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?><input class="btnmain" type="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />&nbsp;&nbsp;<input class="btnlite" type="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" name="reset" /></td>
	</tr>
</table>

<hr />
<br />

<?php $this->_tpl_include('ucp_footer.html'); ?>