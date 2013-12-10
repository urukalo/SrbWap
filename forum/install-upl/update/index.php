<?php

if (!defined('IN_PHPBB'))
{
	exit;
}

// Set update info with file structure to update
$update_info = array(
	'version'	=> array('from' => '3.0.6-RC2', 'to' => '3.0.6'),
'files'		=> array('adm/style/acp_forums_copy_perm.html',
	'adm/style/admin.css',
	'adm/style/captcha_recaptcha.html',
	'feed.php',
	'includes/acp/acp_forums.php',
	'includes/acp/acp_icons.php',
	'includes/acp/acp_profile.php',
	'includes/acp/acp_update.php',
	'includes/acp/acp_users.php',
	'includes/captcha/captcha_factory.php',
	'includes/captcha/plugins/phpbb_captcha_qa_plugin.php',
	'includes/constants.php',
	'includes/db/db_tools.php',
	'includes/db/oracle.php',
	'includes/functions_admin.php',
	'includes/functions_display.php',
	'includes/functions_jabber.php',
	'includes/functions_profile_fields.php',
	'includes/functions_user.php',
	'includes/mcp/mcp_forum.php',
	'includes/mcp/mcp_main.php',
	'includes/mcp/mcp_queue.php',
	'includes/mcp/mcp_reports.php',
	'includes/mcp/mcp_topic.php',
	'includes/message_parser.php',
	'includes/questionnaire/questionnaire.php',
	'includes/template.php',
	'includes/ucp/ucp_pm.php',
	'includes/ucp/ucp_pm_compose.php',
	'includes/ucp/ucp_pm_viewfolder.php',
	'language/en/email/admin_welcome_activated.txt',
	'language/en/email/pm_report_deleted.txt',
	'memberlist.php',
	'posting.php',
	'styles/prosilver/template/captcha_recaptcha.html',
	'styles/prosilver/template/forum_fn.js',
	'styles/prosilver/template/quickreply_editor.html',
	'styles/prosilver/template/ucp_pm_viewfolder.html',
	'styles/subsilver2/template/captcha_recaptcha.html',
	'styles/subsilver2/template/ucp_pm_viewfolder.html'),
'binary'		=> array(),
);

?>