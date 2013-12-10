<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>

<hr />
<table cellspacing="0">
	<tr class="gensmall">
         <?php if ($this->_rootref['S_DISPLAY_SEARCH']) {  ?>

         <td width="50%"><a href="<?php echo (isset($this->_rootref['U_SEARCH_NEW'])) ? $this->_rootref['U_SEARCH_NEW'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_NEW'])) ? $this->_rootref['L_SEARCH_NEW'] : ((isset($user->lang['SEARCH_NEW'])) ? $user->lang['SEARCH_NEW'] : '{ SEARCH_NEW }')); ?></a><br />
            <a href="<?php echo (isset($this->_rootref['U_SEARCH_UNANSWERED'])) ? $this->_rootref['U_SEARCH_UNANSWERED'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_UNANSWERED'])) ? $this->_rootref['L_SEARCH_UNANSWERED'] : ((isset($user->lang['SEARCH_UNANSWERED'])) ? $user->lang['SEARCH_UNANSWERED'] : '{ SEARCH_UNANSWERED }')); ?></a></td>
         <td width="50%" align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>"><a href="<?php echo (isset($this->_rootref['U_SEARCH_SELF'])) ? $this->_rootref['U_SEARCH_SELF'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_SELF'])) ? $this->_rootref['L_SEARCH_SELF'] : ((isset($user->lang['SEARCH_SELF'])) ? $user->lang['SEARCH_SELF'] : '{ SEARCH_SELF }')); ?></a><br />
            <a href="<?php echo (isset($this->_rootref['U_SEARCH_ACTIVE_TOPICS'])) ? $this->_rootref['U_SEARCH_ACTIVE_TOPICS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_ACTIVE_TOPICS'])) ? $this->_rootref['L_SEARCH_ACTIVE_TOPICS'] : ((isset($user->lang['SEARCH_ACTIVE_TOPICS'])) ? $user->lang['SEARCH_ACTIVE_TOPICS'] : '{ SEARCH_ACTIVE_TOPICS }')); ?></a></td>
         <?php } ?>

	</tr>
</table>
<?php } else { ?>

<hr />
<br />
<?php } $this->_tpl_include('forumlist_body.html'); ?>


<hr />
<table cellspacing="0">
	<tr>
		<td class="gensmall" align="center"><strong><?php if (! $this->_rootref['S_IS_BOT']) {  ?><a href="<?php echo (isset($this->_rootref['U_DELETE_COOKIES'])) ? $this->_rootref['U_DELETE_COOKIES'] : ''; ?>">Delete cookies</a><?php } ?> | <a href="<?php echo (isset($this->_rootref['U_TEAM'])) ? $this->_rootref['U_TEAM'] : ''; ?>"><?php echo ((isset($this->_rootref['L_THE_TEAM'])) ? $this->_rootref['L_THE_TEAM'] : ((isset($user->lang['THE_TEAM'])) ? $user->lang['THE_TEAM'] : '{ THE_TEAM }')); ?></a><?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['U_MARK_FORUMS']) {  ?> | <a href="<?php echo (isset($this->_rootref['U_MARK_FORUMS'])) ? $this->_rootref['U_MARK_FORUMS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MARK_FORUMS_READ'])) ? $this->_rootref['L_MARK_FORUMS_READ'] : ((isset($user->lang['MARK_FORUMS_READ'])) ? $user->lang['MARK_FORUMS_READ'] : '{ MARK_FORUMS_READ }')); ?></a><?php } ?></strong></td>
	</tr>
</table>

<?php $this->_tpl_include('breadcrumbs.html'); ?>

<hr />
<br />

<?php if (! $this->_rootref['S_USER_LOGGED_IN']) {  ?>

<form method="post" action="<?php echo (isset($this->_rootref['S_LOGIN_ACTION'])) ? $this->_rootref['S_LOGIN_ACTION'] : ''; ?>">
<hr />
<table cellspacing="0">
	<tr>
		<th><a href="<?php echo (isset($this->_rootref['U_LOGIN_LOGOUT'])) ? $this->_rootref['U_LOGIN_LOGOUT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LOGIN_LOGOUT'])) ? $this->_rootref['L_LOGIN_LOGOUT'] : ((isset($user->lang['LOGIN_LOGOUT'])) ? $user->lang['LOGIN_LOGOUT'] : '{ LOGIN_LOGOUT }')); ?></a></th>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row1" align="center"><span class="genmed"><?php echo ((isset($this->_rootref['L_USERNAME'])) ? $this->_rootref['L_USERNAME'] : ((isset($user->lang['USERNAME'])) ? $user->lang['USERNAME'] : '{ USERNAME }')); ?>:</span> <input class="post" type="text" name="username" size="10" /> <br /> <span class="genmed"><?php echo ((isset($this->_rootref['L_PASSWORD'])) ? $this->_rootref['L_PASSWORD'] : ((isset($user->lang['PASSWORD'])) ? $user->lang['PASSWORD'] : '{ PASSWORD }')); ?>:</span> <input class="post" type="password" name="password" size="10" /> <br /> <?php if ($this->_rootref['S_AUTOLOGIN_ENABLED']) {  ?> <span class="gensmall"><?php echo ((isset($this->_rootref['L_LOG_ME_IN'])) ? $this->_rootref['L_LOG_ME_IN'] : ((isset($user->lang['LOG_ME_IN'])) ? $user->lang['LOG_ME_IN'] : '{ LOG_ME_IN }')); ?></span> <input type="checkbox" class="radio" name="autologin" /><?php } ?></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row3" align="center"><input type="submit" class="btnmain" name="login" value="<?php echo ((isset($this->_rootref['L_LOGIN'])) ? $this->_rootref['L_LOGIN'] : ((isset($user->lang['LOGIN'])) ? $user->lang['LOGIN'] : '{ LOGIN }')); ?>" /></td>
	</tr>
</table>
<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</form>
<hr />
<br />
<?php } if ($this->_rootref['S_DISPLAY_BIRTHDAY_LIST'] && $this->_rootref['BIRTHDAY_LIST']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_BIRTHDAYS'])) ? $this->_rootref['L_BIRTHDAYS'] : ((isset($user->lang['BIRTHDAYS'])) ? $user->lang['BIRTHDAYS'] : '{ BIRTHDAYS }')); ?></th>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr class="row1">
		<td class="genmed"><?php if ($this->_rootref['BIRTHDAY_LIST']) {  echo ((isset($this->_rootref['L_CONGRATULATIONS'])) ? $this->_rootref['L_CONGRATULATIONS'] : ((isset($user->lang['CONGRATULATIONS'])) ? $user->lang['CONGRATULATIONS'] : '{ CONGRATULATIONS }')); ?>: <b><?php echo (isset($this->_rootref['BIRTHDAY_LIST'])) ? $this->_rootref['BIRTHDAY_LIST'] : ''; ?></b><?php } else { echo ((isset($this->_rootref['L_NO_BIRTHDAYS'])) ? $this->_rootref['L_NO_BIRTHDAYS'] : ((isset($user->lang['NO_BIRTHDAYS'])) ? $user->lang['NO_BIRTHDAYS'] : '{ NO_BIRTHDAYS }')); } ?></td>
	</tr>
</table>

<hr />
<br />
<?php } if ($this->_rootref['S_DISPLAY_ONLINE_LIST']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<th><?php if ($this->_rootref['U_VIEWONLINE']) {  ?><a href="<?php echo (isset($this->_rootref['U_VIEWONLINE'])) ? $this->_rootref['U_VIEWONLINE'] : ''; ?>"><?php echo ((isset($this->_rootref['L_WHO_IS_ONLINE'])) ? $this->_rootref['L_WHO_IS_ONLINE'] : ((isset($user->lang['WHO_IS_ONLINE'])) ? $user->lang['WHO_IS_ONLINE'] : '{ WHO_IS_ONLINE }')); ?></a><?php } else { echo ((isset($this->_rootref['L_WHO_IS_ONLINE'])) ? $this->_rootref['L_WHO_IS_ONLINE'] : ((isset($user->lang['WHO_IS_ONLINE'])) ? $user->lang['WHO_IS_ONLINE'] : '{ WHO_IS_ONLINE }')); } ?></th>
	</tr>
</table>
<hr />
<table cellspacing="0">
	<tr class="row1">
		<td class="genmed"><?php echo (isset($this->_rootref['TOTAL_USERS_ONLINE'])) ? $this->_rootref['TOTAL_USERS_ONLINE'] : ''; ?><br /><?php echo (isset($this->_rootref['LOGGED_IN_USER_LIST'])) ? $this->_rootref['LOGGED_IN_USER_LIST'] : ''; ?></td>
	</tr>
</table>

<?php if ($this->_rootref['LEGEND']) {  ?>

<hr />
<table cellspacing="0">
	<tr class="row2">
		<td class="gensmall"><?php echo ((isset($this->_rootref['L_LEGEND'])) ? $this->_rootref['L_LEGEND'] : ((isset($user->lang['LEGEND'])) ? $user->lang['LEGEND'] : '{ LEGEND }')); ?>: <strong><?php echo (isset($this->_rootref['LEGEND'])) ? $this->_rootref['LEGEND'] : ''; ?></strong></td>
	</tr>
</table>
<?php } ?>


<hr />
<br />
<?php } ?>


<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_STATISTICS'])) ? $this->_rootref['L_STATISTICS'] : ((isset($user->lang['STATISTICS'])) ? $user->lang['STATISTICS'] : '{ STATISTICS }')); ?></th>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr class="row1">
		<td class="genmed"><?php echo (isset($this->_rootref['RECORD_USERS'])) ? $this->_rootref['RECORD_USERS'] : ''; ?> :: <?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?> :: <?php echo (isset($this->_rootref['TOTAL_TOPICS'])) ? $this->_rootref['TOTAL_TOPICS'] : ''; ?> :: <?php echo (isset($this->_rootref['TOTAL_USERS'])) ? $this->_rootref['TOTAL_USERS'] : ''; ?> :: <?php echo (isset($this->_rootref['NEWEST_USER'])) ? $this->_rootref['NEWEST_USER'] : ''; ?></td>
	</tr>
</table>
<hr />

<?php $this->_tpl_include('overall_footer.html'); ?>