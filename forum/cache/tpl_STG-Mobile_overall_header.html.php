<?php if (!defined('IN_PHPBB')) exit; ?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>" lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" xml:lang="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>">
<head>

<meta http-equiv="content-type" content="text/html; charset=<?php echo (isset($this->_rootref['S_CONTENT_ENCODING'])) ? $this->_rootref['S_CONTENT_ENCODING'] : ''; ?>" />
<meta http-equiv="content-language" content="<?php echo (isset($this->_rootref['S_USER_LANG'])) ? $this->_rootref['S_USER_LANG'] : ''; ?>" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="imagetoolbar" content="no" />
<meta name="resource-type" content="document" />
<meta name="distribution" content="global" />
<meta name="copyright" content="2000, 2002, 2005, 2007 phpBB Group" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<?php echo (isset($this->_rootref['META'])) ? $this->_rootref['META'] : ''; ?>

<title><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?> &bull; <?php if ($this->_rootref['S_IN_MCP']) {  echo ((isset($this->_rootref['L_MCP'])) ? $this->_rootref['L_MCP'] : ((isset($user->lang['MCP'])) ? $user->lang['MCP'] : '{ MCP }')); ?> &bull; <?php } else if ($this->_rootref['S_IN_UCP']) {  echo ((isset($this->_rootref['L_UCP'])) ? $this->_rootref['L_UCP'] : ((isset($user->lang['UCP'])) ? $user->lang['UCP'] : '{ UCP }')); ?> &bull; <?php } echo (isset($this->_rootref['PAGE_TITLE'])) ? $this->_rootref['PAGE_TITLE'] : ''; ?></title>

<link rel="stylesheet" href="<?php echo (isset($this->_rootref['T_STYLESHEET_LINK'])) ? $this->_rootref['T_STYLESHEET_LINK'] : ''; ?>" type="text/css" />

<script type="text/javascript">
// <![CDATA[
<?php if ($this->_rootref['S_USER_PM_POPUP']) {  ?>

	if (<?php echo (isset($this->_rootref['S_NEW_PM'])) ? $this->_rootref['S_NEW_PM'] : ''; ?>)
	{
		popup('<?php echo (isset($this->_rootref['UA_POPUP_PM'])) ? $this->_rootref['UA_POPUP_PM'] : ''; ?>', 225, 225, '_phpbbprivmsg');
	}
<?php } ?>


function popup(url, width, height, name)
{
	if (!name)
	{
		name = '_popup';
	}

	window.open(url.replace(/&amp;/g, '&'), name, 'height=' + height + ',resizable=yes,scrollbars=yes,width=' + width);
	return false;
}

function jumpto()
{
	var page = prompt('<?php echo ((isset($this->_rootref['LA_JUMP_PAGE'])) ? $this->_rootref['LA_JUMP_PAGE'] : ((isset($this->_rootref['L_JUMP_PAGE'])) ? addslashes($this->_rootref['L_JUMP_PAGE']) : ((isset($user->lang['JUMP_PAGE'])) ? addslashes($user->lang['JUMP_PAGE']) : '{ JUMP_PAGE }'))); ?>:', '<?php echo (isset($this->_rootref['ON_PAGE'])) ? $this->_rootref['ON_PAGE'] : ''; ?>');
	var perpage = '<?php echo (isset($this->_rootref['PER_PAGE'])) ? $this->_rootref['PER_PAGE'] : ''; ?>';
	var base_url = '<?php echo (isset($this->_rootref['A_BASE_URL'])) ? $this->_rootref['A_BASE_URL'] : ''; ?>';

	if (page !== null && !isNaN(page) && page > 0)
	{
		document.location.href = base_url.replace(/&amp;/g, '&') + '&start=' + ((page - 1) * perpage);
	}
}

/**
* Find a member
*/
function find_username(url)
{
	popup(url, 225, 225, '_usersearch');
	return false;
}

/**
* Mark/unmark checklist
* id = ID of parent container, name = name prefix, state = state [true/false]
*/
function marklist(id, name, state)
{
	var parent = document.getElementById(id);
	if (!parent)
	{
		eval('parent = document.' + id);
	}

	if (!parent)
	{
		return;
	}

	var rb = parent.getElementsByTagName('input');
	
	for (var r = 0; r < rb.length; r++)
	{
		if (rb[r].name.substr(0, name.length) == name)
		{
			rb[r].checked = state;
		}
	}
}

<?php if (sizeof($this->_tpldata['_file'])) {  ?>


	/**
	* Play quicktime file by determining it's width/height
	* from the displayed rectangle area
	*
	* Only defined if there is a file block present.
	*/
	function play_qt_file(obj)
	{
		var rectangle = obj.GetRectangle();

		if (rectangle)
		{
			rectangle = rectangle.split(',')
			var x1 = parseInt(rectangle[0]);
			var x2 = parseInt(rectangle[2]);
			var y1 = parseInt(rectangle[1]);
			var y2 = parseInt(rectangle[3]);

			var width = (x1 < 0) ? (x1 * -1) + x2 : x2 - x1;
			var height = (y1 < 0) ? (y1 * -1) + y2 : y2 - y1;
		}
		else
		{
			var width = 200;
			var height = 0;
		}

		obj.width = width;
		obj.height = height + 16;

		obj.SetControllerVisible(true);

		obj.Play();
	}
<?php } ?>


    window.onload = resizeimg;
    function resizeimg()
    {
       if (document.getElementsByTagName)
       {
          for (i=0; i<document.getElementsByTagName('img').length; i++)
          {
             im = document.getElementsByTagName('img')[i];
             if (im.width > 225)
             {
                im.style.width = '100%';
             }
          }
       }
    }

// ]]>
</script>
</head>
<body class="<?php echo (isset($this->_rootref['S_CONTENT_DIRECTION'])) ? $this->_rootref['S_CONTENT_DIRECTION'] : ''; ?>">

<a name="top"></a>

<hr />
<table cellspacing="0">
	<tr>
		<td class="header" align="center" valign="middle"><a class="nav" href="<?php echo (isset($this->_rootref['U_INDEX'])) ? $this->_rootref['U_INDEX'] : ''; ?>"><?php echo (isset($this->_rootref['SITE_LOGO_IMG'])) ? $this->_rootref['SITE_LOGO_IMG'] : ''; ?></a></td>
	</tr>
</table>

<?php if ($this->_rootref['SCRIPT_NAME'] == ("index")) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="gensmall" style="padding: 4px" align="center"><strong><?php echo (isset($this->_rootref['SITE_DESCRIPTION'])) ? $this->_rootref['SITE_DESCRIPTION'] : ''; ?></strong></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr>
		<td class="welcome"><?php if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>Hello <?php echo (isset($this->_rootref['S_USERNAME'])) ? $this->_rootref['S_USERNAME'] : ''; ?>, Welcome Back!<?php } else { ?>Hello Mobile Device User!<?php } ?></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr class="row2">
		<td align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>">
			<?php if (! $this->_rootref['S_IS_BOT']) {  ?><a class="nowrap" href="<?php echo (isset($this->_rootref['U_LOGIN_LOGOUT'])) ? $this->_rootref['U_LOGIN_LOGOUT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LOGIN_LOGOUT'])) ? $this->_rootref['L_LOGIN_LOGOUT'] : ((isset($user->lang['LOGIN_LOGOUT'])) ? $user->lang['LOGIN_LOGOUT'] : '{ LOGIN_LOGOUT }')); ?></a><?php } if ($this->_rootref['U_RESTORE_PERMISSIONS']) {  ?><br /><a class="nowrap" href="<?php echo (isset($this->_rootref['U_RESTORE_PERMISSIONS'])) ? $this->_rootref['U_RESTORE_PERMISSIONS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_RESTORE_PERMISSIONS'])) ? $this->_rootref['L_RESTORE_PERMISSIONS'] : ((isset($user->lang['RESTORE_PERMISSIONS'])) ? $user->lang['RESTORE_PERMISSIONS'] : '{ RESTORE_PERMISSIONS }')); ?></a><?php } if ($this->_rootref['S_BOARD_DISABLED'] && $this->_rootref['S_USER_LOGGED_IN']) {  ?><br /><span style="color: red;"><?php echo ((isset($this->_rootref['L_BOARD_DISABLED'])) ? $this->_rootref['L_BOARD_DISABLED'] : ((isset($user->lang['BOARD_DISABLED'])) ? $user->lang['BOARD_DISABLED'] : '{ BOARD_DISABLED }')); ?></span><?php } ?>

		</td>
		<td align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>">
<?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_USER_LOGGED_IN']) {  if ($this->_rootref['S_DISPLAY_PM']) {  if ($this->_rootref['S_USER_NEW_PRIVMSG'] || $this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD']) {  if ($this->_rootref['S_USER_NEW_PRIVMSG']) {  ?>

			<a class="newpm" href="<?php echo (isset($this->_rootref['U_PRIVATEMSGS'])) ? $this->_rootref['U_PRIVATEMSGS'] : ''; ?>"><blink><?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO'] : ''; ?></blink></a>
			<?php } else { ?>

			<a class="unreadpm" href="<?php echo (isset($this->_rootref['U_PRIVATEMSGS'])) ? $this->_rootref['U_PRIVATEMSGS'] : ''; ?>"><?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO_UNREAD'] : ''; ?></a>
			<?php } } else { ?>

			<a href="<?php echo (isset($this->_rootref['U_PRIVATEMSGS'])) ? $this->_rootref['U_PRIVATEMSGS'] : ''; ?>"><?php echo (isset($this->_rootref['PRIVATE_MESSAGE_INFO'])) ? $this->_rootref['PRIVATE_MESSAGE_INFO'] : ''; ?></a>
		<?php } } } else { if ($this->_rootref['S_REGISTER_ENABLED']) {  ?>

			<a href="<?php echo (isset($this->_rootref['U_REGISTER'])) ? $this->_rootref['U_REGISTER'] : ''; ?>"><?php echo ((isset($this->_rootref['L_REGISTER'])) ? $this->_rootref['L_REGISTER'] : ((isset($user->lang['REGISTER'])) ? $user->lang['REGISTER'] : '{ REGISTER }')); ?></a>
		<?php } } ?>

		</td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row1" class="small" align="center"><?php echo (isset($this->_rootref['CURRENT_TIME'])) ? $this->_rootref['CURRENT_TIME'] : ''; if ($this->_rootref['S_USER_LOGGED_IN']) {  ?><br /><?php echo (isset($this->_rootref['LAST_VISIT_DATE'])) ? $this->_rootref['LAST_VISIT_DATE'] : ''; } ?></td>
	</tr>
</table>
<?php } ?>


<hr />
<table cellspacing="0">
	<tr>
		<td class="genmed" align="center">
			<a href="<?php echo (isset($this->_rootref['U_FAQ'])) ? $this->_rootref['U_FAQ'] : ''; ?>"><?php echo ((isset($this->_rootref['L_FAQ'])) ? $this->_rootref['L_FAQ'] : ((isset($user->lang['FAQ'])) ? $user->lang['FAQ'] : '{ FAQ }')); ?></a>
			<?php if ($this->_rootref['S_DISPLAY_SEARCH']) {  ?> &bull; <a href="<?php echo (isset($this->_rootref['U_SEARCH'])) ? $this->_rootref['U_SEARCH'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH'])) ? $this->_rootref['L_SEARCH'] : ((isset($user->lang['SEARCH'])) ? $user->lang['SEARCH'] : '{ SEARCH }')); ?></a><?php } if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['S_USER_LOGGED_IN']) {  if ($this->_rootref['S_DISPLAY_MEMBERLIST']) {  ?> &bull; <a href="<?php echo (isset($this->_rootref['U_MEMBERLIST'])) ? $this->_rootref['U_MEMBERLIST'] : ''; ?>"><?php echo ((isset($this->_rootref['L_MEMBERLIST'])) ? $this->_rootref['L_MEMBERLIST'] : ((isset($user->lang['MEMBERLIST'])) ? $user->lang['MEMBERLIST'] : '{ MEMBERLIST }')); ?></a><?php } ?><br />
			<?php if (! $this->_rootref['S_CHAT']) {  ?><a href="<?php echo (isset($this->_rootref['U_CHAT'])) ? $this->_rootref['U_CHAT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_CHAT'])) ? $this->_rootref['L_CHAT'] : ((isset($user->lang['CHAT'])) ? $user->lang['CHAT'] : '{ CHAT }')); ?></a> &bull; <?php } ?>

			<a href="<?php echo (isset($this->_rootref['U_PROFILE'])) ? $this->_rootref['U_PROFILE'] : ''; ?>">UCP</a>
			<?php if ($this->_rootref['U_MCP']) {  ?> &bull; <a href="<?php echo (isset($this->_rootref['U_MCP'])) ? $this->_rootref['U_MCP'] : ''; ?>">MCP</a><?php } if ($this->_rootref['U_ACP']) {  ?> &bull; <a href="<?php echo (isset($this->_rootref['U_ACP'])) ? $this->_rootref['U_ACP'] : ''; ?>">ACP</a><?php } } ?>

		</td>
	</tr>
</table>

<?php $this->_tpl_include('breadcrumbs.html'); ?>