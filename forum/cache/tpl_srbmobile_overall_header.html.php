<?php if (!defined('IN_PHPBB')) exit; ?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN"
    "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>">

<head>
<title><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>:<?php if ($this->_rootref['S_IN_MCP']) {  echo ((isset($this->_rootref['L_MCP'])) ? $this->_rootref['L_MCP'] : ((isset($user->lang['MCP'])) ? $user->lang['MCP'] : '{ MCP }')); ?>:<?php } else if ($this->_rootref['S_IN_UCP']) {  echo ((isset($this->_rootref['L_UCP'])) ? $this->_rootref['L_UCP'] : ((isset($user->lang['UCP'])) ? $user->lang['UCP'] : '{ UCP }')); ?>:<?php } echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>

<link href="http://wap.srb.rs/teme/standard.css" rel="stylesheet" type="text/css" />


</head>
<body>

<a name="top"></a>

		<table width="100%" cellspacing="0" align="center">
        
		<tr>
			<td><a href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>"><?php echo (isset($this->_rootref['SITE_LOGO_IMG'])) ? $this->_rootref['SITE_LOGO_IMG'] : ''; ?></a></td>
		</tr>
        <tr>
			<td><h1><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?></h1><?php echo (isset($this->_rootref['SITE_DESCRIPTION'])) ? $this->_rootref['SITE_DESCRIPTION'] : ''; ?></td>
		</tr>

		<tr align="center">
			<td>
				<a href="<?php echo (isset($this->_rootref['U_FAQ'])) ? $this->_rootref['U_FAQ'] : ''; ?>"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/icon_mini_faq.gif" width="12" height="13" alt="*" /> <?php echo ((isset($this->_rootref['L_FAQ'])) ? $this->_rootref['L_FAQ'] : ((isset($user->lang['FAQ'])) ? $user->lang['FAQ'] : '{ FAQ }')); ?></a>
				<?php if ($this->_rootref['S_DISPLAY_SEARCH']) {  ?>&nbsp; &nbsp;<a href="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/icon_mini_search.gif" width="12" height="13" alt="*" /> <?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?></a><?php } if (! $this->_rootref['S_IS_BOT']) {  if ($this->_rootref['S_DISPLAY_MEMBERLIST']) {  ?>&nbsp; &nbsp;<a href="<?php echo (isset($this->_rootref['U_MEMBERLIST'])) ? $this->_rootref['U_MEMBERLIST'] : ''; ?>"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/icon_mini_members.gif" width="12" height="13" alt="*" /> <?php echo ((isset($this->_rootref['L_MEMBERLIST'])) ? $this->_rootref['L_MEMBERLIST'] : ((isset($user->lang['MEMBERLIST'])) ? $user->lang['MEMBERLIST'] : '{ MEMBERLIST }')); ?></a><?php } } ?>
			
			</td>
		</tr>
		
		<tr>
			<td>
				<?php if (! $this->_rootref['S_IS_BOT']) {  if ($this->_rootref['S_USER_LOGGED_IN']) {  ?><a href="<?php echo (isset($this->_rootref['U_PROFILE'])) ? $this->_rootref['U_PROFILE'] : ''; ?>"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/icon_mini_profile.gif" width="12" height="13" alt="*" /><?php echo ((isset($this->_rootref['L_PROFILE'])) ? $this->_rootref['L_PROFILE'] : ((isset($user->lang['PROFILE'])) ? $user->lang['PROFILE'] : '{ PROFILE }')); ?> </a>&nbsp; &nbsp;<?php } ?> 
                <a href="<?php echo (isset($this->_rootref['U_LOGIN_LOGOUT'])) ? $this->_rootref['U_LOGIN_LOGOUT'] : ''; ?>"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/icon_mini_login.gif" width="12" height="13" alt="*" /> <?php echo ((isset($this->_rootref['L_LOGIN_LOGOUT'])) ? $this->_rootref['L_LOGIN_LOGOUT'] : ((isset($user->lang['LOGIN_LOGOUT'])) ? $user->lang['LOGIN_LOGOUT'] : '{ LOGIN_LOGOUT }')); ?></a>&nbsp;<?php } if ($this->_rootref['U_RESTORE_PERMISSIONS']) {  ?> &nbsp;<a href="<?php echo (isset($this->_rootref['U_RESTORE_PERMISSIONS'])) ? $this->_rootref['U_RESTORE_PERMISSIONS'] : ''; ?>"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/icon_mini_login.gif" width="12" height="13" alt="*" /> <?php echo ((isset($this->_rootref['L_RESTORE_PERMISSIONS'])) ? $this->_rootref['L_RESTORE_PERMISSIONS'] : ((isset($user->lang['RESTORE_PERMISSIONS'])) ? $user->lang['RESTORE_PERMISSIONS'] : '{ RESTORE_PERMISSIONS }')); ?></a><?php } if ($this->_rootref['S_BOARD_DISABLED'] && $this->_rootref['S_USER_LOGGED_IN']) {  ?> &nbsp;<span style="color: red;"><?php echo ((isset($this->_rootref['L_BOARD_DISABLED'])) ? $this->_rootref['L_BOARD_DISABLED'] : ((isset($user->lang['BOARD_DISABLED'])) ? $user->lang['BOARD_DISABLED'] : '{ BOARD_DISABLED }')); ?></span><?php } if (! $this->_rootref['S_IS_BOT']) {  if ($this->_rootref['S_USER_LOGGED_IN']) {  if ($this->_rootref['S_DISPLAY_PM']) {  ?> &nbsp;<a href="<?php echo (isset($this->_rootref['U_PRIVATEMSGS'])) ? $this->_rootref['U_PRIVATEMSGS'] : ''; ?>"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/icon_mini_message.gif" width="12" height="13" alt="*" /> <?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO'] : ''; if ($this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD']) {  ?>, <?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD'] : ''; } ?></a><?php } } else if ($this->_rootref['S_REGISTER_ENABLED'] && ! ( $this->_rootref['S_SHOW_COPPA'] || $this->_rootref['S_REGISTRATION'] )) {  ?> &nbsp;<a href="<?php echo (isset($this->_rootref['U_REGISTER'])) ? $this->_rootref['U_REGISTER'] : ''; ?>"><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/icon_mini_register.gif" width="12" height="13" alt="*" /> <?php echo ((isset($this->_rootref['L_REGISTER'])) ? $this->_rootref['L_REGISTER'] : ((isset($user->lang['REGISTER'])) ? $user->lang['REGISTER'] : '{ REGISTER }')); ?></a>
					<?php } } ?>
			</td>
		</tr>
		



	<?php if ($this->_rootref['S_DISPLAY_SEARCH']) {  ?>
	<tr>
	  <td>
		
			<a href="<?php echo (isset($this->_rootref['U_SEARCH_UNANSWERED'])) ? $this->_rootref['U_SEARCH_UNANSWERED'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_UNANSWERED'])) ? $this->_rootref['L_SEARCH_UNANSWERED'] : ((isset($user->lang['SEARCH_UNANSWERED'])) ? $user->lang['SEARCH_UNANSWERED'] : '{ SEARCH_UNANSWERED }')); ?></a> | <a href="<?php echo (isset($this->_rootref['U_SEARCH_ACTIVE_TOPICS'])) ? $this->_rootref['U_SEARCH_ACTIVE_TOPICS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_ACTIVE_TOPICS'])) ? $this->_rootref['L_SEARCH_ACTIVE_TOPICS'] : ((isset($user->lang['SEARCH_ACTIVE_TOPICS'])) ? $user->lang['SEARCH_ACTIVE_TOPICS'] : '{ SEARCH_ACTIVE_TOPICS }')); ?></a>
		
		<?php if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>
		
			 | <a href="<?php echo (isset($this->_rootref['U_SEARCH_UNREAD'])) ? $this->_rootref['U_SEARCH_UNREAD'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_UNREAD'])) ? $this->_rootref['L_SEARCH_UNREAD'] : ((isset($user->lang['SEARCH_UNREAD'])) ? $user->lang['SEARCH_UNREAD'] : '{ SEARCH_UNREAD }')); ?></a> | <a href="<?php echo (isset($this->_rootref['U_SEARCH_NEW'])) ? $this->_rootref['U_SEARCH_NEW'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_NEW'])) ? $this->_rootref['L_SEARCH_NEW'] : ((isset($user->lang['SEARCH_NEW'])) ? $user->lang['SEARCH_NEW'] : '{ SEARCH_NEW }')); ?></a> | <a href="<?php echo (isset($this->_rootref['U_SEARCH_SELF'])) ? $this->_rootref['U_SEARCH_SELF'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_SELF'])) ? $this->_rootref['L_SEARCH_SELF'] : ((isset($user->lang['SEARCH_SELF'])) ? $user->lang['SEARCH_SELF'] : '{ SEARCH_SELF }')); ?></a>
		
		<?php } ?>
	</td></tr>
	<?php } ?>
</table>
	<?php $this->_tpl_include('breadcrumbs.html'); ?>