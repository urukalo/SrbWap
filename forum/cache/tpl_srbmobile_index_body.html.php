<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); if ($this->_rootref['U_MCP']) {  ?>
[ <a href="<?php echo (isset($this->_rootref['U_MCP'])) ? $this->_rootref['U_MCP'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MCP'])) ? $this->_rootref['L_MCP'] : ((isset($user->lang['MCP'])) ? $user->lang['MCP'] : '{ MCP }')); ?></a> ]

<br />
<?php } $this->_tpl_include('forumlist_body.html'); if (! $this->_rootref['S_IS_BOT'] || $this->_rootref['U_TEAM']) {  if (! $this->_rootref['S_IS_BOT']) {  ?><a href="<?php echo (isset($this->_rootref['U_DELETE_COOKIES'])) ? $this->_rootref['U_DELETE_COOKIES'] : ''; ?>"><?php echo ((isset($this->_rootref['L_DELETE_COOKIES'])) ? $this->_rootref['L_DELETE_COOKIES'] : ((isset($user->lang['DELETE_COOKIES'])) ? $user->lang['DELETE_COOKIES'] : '{ DELETE_COOKIES }')); ?></a><?php } if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['U_TEAM']) {  ?> | <?php } if ($this->_rootref['U_TEAM']) {  ?><a href="<?php echo (isset($this->_rootref['U_TEAM'])) ? $this->_rootref['U_TEAM'] : ''; ?>"><?php echo ((isset($this->_rootref['L_THE_TEAM'])) ? $this->_rootref['L_THE_TEAM'] : ((isset($user->lang['THE_TEAM'])) ? $user->lang['THE_TEAM'] : '{ THE_TEAM }')); ?></a><?php } ?><br />
<?php } $this->_tpl_include('breadcrumbs.html'); ?>

	<table width="100%" cellspacing="0">
<?php if ($this->_rootref['S_DISPLAY_ONLINE_LIST']) {  ?>


	<tr>
		<td><?php if ($this->_rootref['U_VIEWONLINE']) {  ?><h4><a href="<?php echo (isset($this->_rootref['U_VIEWONLINE'])) ? $this->_rootref['U_VIEWONLINE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_WHO_IS_ONLINE'])) ? $this->_rootref['L_WHO_IS_ONLINE'] : ((isset($user->lang['WHO_IS_ONLINE'])) ? $user->lang['WHO_IS_ONLINE'] : '{ WHO_IS_ONLINE }')); ?></a></h4><?php } else { ?><h4><?php echo ((isset($this->_rootref['L_WHO_IS_ONLINE'])) ? $this->_rootref['L_WHO_IS_ONLINE'] : ((isset($user->lang['WHO_IS_ONLINE'])) ? $user->lang['WHO_IS_ONLINE'] : '{ WHO_IS_ONLINE }')); ?></h4><?php } ?></td>
	</tr>


<?php } if ($this->_rootref['S_DISPLAY_BIRTHDAY_LIST']) {  ?>

	<tr>
		<td><p><?php echo ((isset($this->_rootref['L_BIRTHDAYS'])) ? $this->_rootref['L_BIRTHDAYS'] : ((isset($user->lang['BIRTHDAYS'])) ? $user->lang['BIRTHDAYS'] : '{ BIRTHDAYS }')); ?>: <?php if ($this->_rootref['BIRTHDAY_LIST']) {  echo ((isset($this->_rootref['L_CONGRATULATIONS'])) ? $this->_rootref['L_CONGRATULATIONS'] : ((isset($user->lang['CONGRATULATIONS'])) ? $user->lang['CONGRATULATIONS'] : '{ CONGRATULATIONS }')); ?>: <b><?php echo (isset($this->_rootref['BIRTHDAY_LIST'])) ? $this->_rootref['BIRTHDAY_LIST'] : ''; ?></b><?php } else { echo ((isset($this->_rootref['L_NO_BIRTHDAYS'])) ? $this->_rootref['L_NO_BIRTHDAYS'] : ((isset($user->lang['NO_BIRTHDAYS'])) ? $user->lang['NO_BIRTHDAYS'] : '{ NO_BIRTHDAYS }')); } ?></p></td>
	</tr>

<?php } ?>


<tr>
	<td><p><?php echo ((isset($this->_rootref['L_STATISTICS'])) ? $this->_rootref['L_STATISTICS'] : ((isset($user->lang['STATISTICS'])) ? $user->lang['STATISTICS'] : '{ STATISTICS }')); ?>: <?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?> | <?php echo (isset($this->_rootref['TOTAL_TOPICS'])) ? $this->_rootref['TOTAL_TOPICS'] : ''; ?> | <?php echo (isset($this->_rootref['TOTAL_USERS'])) ? $this->_rootref['TOTAL_USERS'] : ''; ?> | <?php echo (isset($this->_rootref['NEWEST_USER'])) ? $this->_rootref['NEWEST_USER'] : ''; ?></p></td>
</tr>
</table>

<?php if (! $this->_rootref['S_USER_LOGGED_IN'] && ! $this->_rootref['S_IS_BOT']) {  ?>

	<form method="post" action="<?php echo (isset($this->_rootref['S_LOGIN_ACTION'])) ? $this->_rootref['S_LOGIN_ACTION'] : ''; ?>">

	<table width="100%" cellspacing="1">
	<tr>
		<td><h4><a href="<?php echo (isset($this->_rootref['U_LOGIN_LOGOUT'])) ? $this->_rootref['U_LOGIN_LOGOUT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LOGIN_LOGOUT'])) ? $this->_rootref['L_LOGIN_LOGOUT'] : ((isset($user->lang['LOGIN_LOGOUT'])) ? $user->lang['LOGIN_LOGOUT'] : '{ LOGIN_LOGOUT }')); ?></a></h4><p><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>: <input class="post" type="text" name="username" size="10" />&nbsp; <?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>: <input class="post" type="password" name="password" size="10" />&nbsp; <?php if ($this->_rootref['S_AUTOLOGIN_ENABLED']) {  ?> <span class="gensmall"><?php echo ((isset($this->_rootref['L_LOG_ME_IN'])) ? $this->_rootref['L_LOG_ME_IN'] : ((isset($user->lang['LOG_ME_IN'])) ? $user->lang['LOG_ME_IN'] : '{ LOG_ME_IN }')); ?></span> <input type="checkbox" class="radio" name="autologin" /><?php } ?>&nbsp; <input type="submit" class="btnmain" name="login" value="<?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?>" /></p></td>
	</tr>
	<tr>
		<td align="center"></td>
	</tr>
	</table>
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>
	</form>
<?php } $this->_tpl_include('overall_footer.html'); ?>