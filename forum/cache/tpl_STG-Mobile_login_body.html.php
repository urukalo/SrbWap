<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<form action="<?php echo (isset($this->_rootref['S_LOGIN_ACTION'])) ? $this->_rootref['S_LOGIN_ACTION'] : ''; ?>" method="post">

	<?php if (! $this->_rootref['S_ADMIN_AUTH']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?></th>
	</tr>
</table>
	<?php } else { ?>

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?></th>
	</tr>
</table>
<hr />
<table cellspacing="0">
	<tr class="row2">
		<td><?php echo (isset($this->_rootref['LOGIN_EXPLAIN'])) ? $this->_rootref['LOGIN_EXPLAIN'] : ''; ?></th>
	</tr>
</table>
	<?php } if ($this->_rootref['LOGIN_EXPLAIN'] && ! $this->_rootref['S_ADMIN_AUTH']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?></th>
	</tr>
</table>
<hr />
<table cellspacing="0">
	<tr class="row2">
		<td><?php echo (isset($this->_rootref['LOGIN_EXPLAIN'])) ? $this->_rootref['LOGIN_EXPLAIN'] : ''; ?></td>
	</tr>
</table>
<?php } if (! $this->_rootref['S_ADMIN_AUTH']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?></th>
	</tr>
</table>
<hr />
<table cellspacing="0">
	<tr class="row2">
		<td><?php echo ((isset($this->_rootref['L_LOGIN_INFO'])) ? $this->_rootref['L_LOGIN_INFO'] : ((isset($user->lang['LOGIN_INFO'])) ? $user->lang['LOGIN_INFO'] : '{ LOGIN_INFO }')); ?></td>
	</tr>
</table>
	<?php } if ($this->_rootref['LOGIN_ERROR']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row2" class="gensmall" align="center">
			<span class="error"><?php echo (isset($this->_rootref['LOGIN_ERROR'])) ? $this->_rootref['LOGIN_ERROR'] : ''; ?></span>
		</td>
	</tr>
</table>
		<?php } ?>


<hr />
<table cellspacing="0">
	<tr class="row1">
		<td>
<table cellspacing="0">
	<tr>
		<td align="center">
			<a href="<?php echo (isset($this->_rootref['U_TERMS_USE'])) ? $this->_rootref['U_TERMS_USE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_TERMS_USE'])) ? $this->_rootref['L_TERMS_USE'] : ((isset($user->lang['TERMS_USE'])) ? $user->lang['TERMS_USE'] : '{ TERMS_USE }')); ?></a> | <a href="<?php echo (isset($this->_rootref['U_PRIVACY'])) ? $this->_rootref['U_PRIVACY'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PRIVACY'])) ? $this->_rootref['L_PRIVACY'] : ((isset($user->lang['PRIVACY'])) ? $user->lang['PRIVACY'] : '{ PRIVACY }')); ?></a>
		</td>
	</tr>
		<?php if (! $this->_rootref['S_ADMIN_AUTH']) {  ?>

	<tr>
		<td align="center">
			<a class="gensmall" href="<?php echo (isset($this->_rootref['U_REGISTER'])) ? $this->_rootref['U_REGISTER'] : ''; ?>"><?php echo ((isset($this->_rootref['L_REGISTER'])) ? $this->_rootref['L_REGISTER'] : ((isset($user->lang['REGISTER'])) ? $user->lang['REGISTER'] : '{ REGISTER }')); ?></a>
		</td>
	</tr>
		<?php } ?>

	<tr>
		<td align="center">
			<b class="genmed"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>: </b><input class="post" type="text" name="<?php echo (isset($this->_rootref['USERNAME_CREDENTIAL'])) ? $this->_rootref['USERNAME_CREDENTIAL'] : ''; ?>" size="25" value="<?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>" tabindex="1" />
		</td>
	</tr>
	<tr>
		<td align="center">
			<b class="genmed"><?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>: </b><input class="post" type="password" name="<?php echo (isset($this->_rootref['PASSWORD_CREDENTIAL'])) ? $this->_rootref['PASSWORD_CREDENTIAL'] : ''; ?>" size="25" tabindex="2" />
		</td>
	</tr>
	<tr>
		<td align="center">
			<?php if ($this->_rootref['U_SEND_PASSWORD']) {  ?><a class="gensmall" href="<?php echo (isset($this->_rootref['U_SEND_PASSWORD'])) ? $this->_rootref['U_SEND_PASSWORD'] : ''; ?>"><?php echo ((isset($this->_rootref['L_FORGOT_PASS'])) ? $this->_rootref['L_FORGOT_PASS'] : ((isset($user->lang['FORGOT_PASS'])) ? $user->lang['FORGOT_PASS'] : '{ FORGOT_PASS }')); ?></a><?php } if ($this->_rootref['U_RESEND_ACTIVATION'] && ! $this->_rootref['S_ADMIN_AUTH']) {  ?><br /><a class="gensmall" href="<?php echo (isset($this->_rootref['U_RESEND_ACTIVATION'])) ? $this->_rootref['U_RESEND_ACTIVATION'] : ''; ?>"><?php echo ((isset($this->_rootref['L_RESEND_ACTIVATION'])) ? $this->_rootref['L_RESEND_ACTIVATION'] : ((isset($user->lang['RESEND_ACTIVATION'])) ? $user->lang['RESEND_ACTIVATION'] : '{ RESEND_ACTIVATION }')); ?></a><?php } ?>

		</td>
	</tr>
<?php if ($this->_rootref['S_DISPLAY_FULL_LOGIN']) {  if ($this->_rootref['S_AUTOLOGIN_ENABLED']) {  ?>

	<tr>
		<td align="center">
			<input type="checkbox" class="radio" name="autologin" tabindex="3" /> <span class="gensmall"><?php echo ((isset($this->_rootref['L_LOG_ME_IN'])) ? $this->_rootref['L_LOG_ME_IN'] : ((isset($user->lang['LOG_ME_IN'])) ? $user->lang['LOG_ME_IN'] : '{ LOG_ME_IN }')); ?></span>
		</td>
	</tr>
	<?php } ?>

	<tr>
		<td>
			<input type="checkbox" class="radio" name="viewonline" tabindex="4" /> <span class="gensmall"><?php echo ((isset($this->_rootref['L_HIDE_ME'])) ? $this->_rootref['L_HIDE_ME'] : ((isset($user->lang['HIDE_ME'])) ? $user->lang['HIDE_ME'] : '{ HIDE_ME }')); ?></span>
		</td>
	</tr>
		<?php } if ($this->_rootref['S_CONFIRM_CODE']) {  ?>

	<tr> 
		<td align="center"><?php echo ((isset($this->_rootref['L_LOGIN_CONFIRMATION'])) ? $this->_rootref['L_LOGIN_CONFIRMATION'] : ((isset($user->lang['LOGIN_CONFIRMATION'])) ? $user->lang['LOGIN_CONFIRMATION'] : '{ LOGIN_CONFIRMATION }')); ?></td>
	</tr>
	<tr> 
		<td align="center">
			<span class="gensmall"><?php echo ((isset($this->_rootref['L_LOGIN_CONFIRM_EXPLAIN'])) ? $this->_rootref['L_LOGIN_CONFIRM_EXPLAIN'] : ((isset($user->lang['LOGIN_CONFIRM_EXPLAIN'])) ? $user->lang['LOGIN_CONFIRM_EXPLAIN'] : '{ LOGIN_CONFIRM_EXPLAIN }')); ?></span>
		</td>
	</tr>
	<tr>
		<td align="center">
			<input type="hidden" name="confirm_id" value="<?php echo (isset($this->_rootref['CONFIRM_ID'])) ? $this->_rootref['CONFIRM_ID'] : ''; ?>" />
			<?php echo (isset($this->_rootref['CONFIRM_IMAGE'])) ? $this->_rootref['CONFIRM_IMAGE'] : ''; ?>

		</td>
	</tr>
	<tr> 
		<td align="center">
			<b class="genmed"><?php echo ((isset($this->_rootref['L_CONFIRM_CODE'])) ? $this->_rootref['L_CONFIRM_CODE'] : ((isset($user->lang['CONFIRM_CODE'])) ? $user->lang['CONFIRM_CODE'] : '{ CONFIRM_CODE }')); ?>: </b><input class="post" type="text" name="confirm_code" size="8" maxlength="8" /><br /><span class="gensmall"><?php echo ((isset($this->_rootref['L_CONFIRM_CODE_EXPLAIN'])) ? $this->_rootref['L_CONFIRM_CODE_EXPLAIN'] : ((isset($user->lang['CONFIRM_CODE_EXPLAIN'])) ? $user->lang['CONFIRM_CODE_EXPLAIN'] : '{ CONFIRM_CODE_EXPLAIN }')); ?></span>
		</td>
	</tr>
<?php } ?>

</table>
		</td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr class="cat">
		<td align="center">
			<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?><input type="submit" name="login" class="btnmain" value="<?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?>" tabindex="5" />
		</td>
	</tr>
</table>
<hr />
<br />
<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>


</form>

<?php $this->_tpl_include('breadcrumbs.html'); ?>


<hr />
<div align="center"><?php $this->_tpl_include('jumpbox.html'); ?></div>

<br />

<?php $this->_tpl_include('overall_footer.html'); ?>