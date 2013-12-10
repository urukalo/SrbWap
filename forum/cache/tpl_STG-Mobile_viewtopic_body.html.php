<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<div id="pageheader">
<?php if ($this->_rootref['MODERATORS']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="moderators"><?php if ($this->_rootref['S_SINGLE_MODERATOR']) {  echo ((isset($this->_rootref['L_MODERATOR'])) ? $this->_rootref['L_MODERATOR'] : ((isset($user->lang['MODERATOR'])) ? $user->lang['MODERATOR'] : '{ MODERATOR }')); } else { echo ((isset($this->_rootref['L_MODERATORS'])) ? $this->_rootref['L_MODERATORS'] : ((isset($user->lang['MODERATORS'])) ? $user->lang['MODERATORS'] : '{ MODERATORS }')); } ?>: <?php echo (isset($this->_rootref['MODERATORS'])) ? $this->_rootref['MODERATORS'] : ''; ?></td>
	</tr>
</table>
<?php } ?>

</div>

<?php if ($this->_rootref['S_HAS_POLL']) {  ?>

<form method="post" action="<?php echo (isset($this->_rootref['S_POLL_ACTION'])) ? $this->_rootref['S_POLL_ACTION'] : ''; ?>">
<hr />
<table cellspacing="0">
	<tr>
		<td align="center"><span class="gen"><b><?php echo (isset($this->_rootref['POLL_QUESTION'])) ? $this->_rootref['POLL_QUESTION'] : ''; ?></b></span><br /><span class="gensmall"><?php echo ((isset($this->_rootref['L_POLL_LENGTH'])) ? $this->_rootref['L_POLL_LENGTH'] : ((isset($user->lang['POLL_LENGTH'])) ? $user->lang['POLL_LENGTH'] : '{ POLL_LENGTH }')); ?></span></td>
	</tr>
	<tr>
		<td  align="center">
			<table cellspacing="0">
			<?php $_poll_option_count = (isset($this->_tpldata['poll_option'])) ? sizeof($this->_tpldata['poll_option']) : 0;if ($_poll_option_count) {for ($_poll_option_i = 0; $_poll_option_i < $_poll_option_count; ++$_poll_option_i){$_poll_option_val = &$this->_tpldata['poll_option'][$_poll_option_i]; ?>

				<tr>
				<?php if ($this->_rootref['S_CAN_VOTE']) {  ?>

					<td>
					<?php if ($this->_rootref['S_IS_MULTI_CHOICE']) {  ?>

						<input type="checkbox" class="radio" name="vote_id[]" value="<?php echo $_poll_option_val['POLL_OPTION_ID']; ?>"<?php if ($_poll_option_val['POLL_OPTION_VOTED']) {  ?> checked="checked"<?php } ?> />
					<?php } else { ?>

						<input type="radio" class="radio" name="vote_id[]" value="<?php echo $_poll_option_val['POLL_OPTION_ID']; ?>"<?php if ($_poll_option_val['POLL_OPTION_VOTED']) {  ?> checked="checked"<?php } ?> />
					<?php } ?>

					</td>
				<?php } ?>

					<td><span class="gen"><?php echo $_poll_option_val['POLL_OPTION_CAPTION']; ?></span></td>
				<?php if ($this->_rootref['S_DISPLAY_RESULTS']) {  ?>

					<td dir="ltr"><?php echo (isset($this->_rootref['POLL_LEFT_CAP_IMG'])) ? $this->_rootref['POLL_LEFT_CAP_IMG'] : ''; echo $_poll_option_val['POLL_OPTION_IMG']; echo (isset($this->_rootref['POLL_RIGHT_CAP_IMG'])) ? $this->_rootref['POLL_RIGHT_CAP_IMG'] : ''; ?></td>
					<td class="gen" align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>"><b>&nbsp;<?php echo $_poll_option_val['POLL_OPTION_PERCENT']; ?>&nbsp;</b></td>
					<td class="gen" align="center">[ <?php echo $_poll_option_val['POLL_OPTION_RESULT']; ?> ]</td>
					<?php if ($_poll_option_val['POLL_OPTION_VOTED']) {  ?>

					<td class="gensmall" valign="top"><b title="<?php echo ((isset($this->_rootref['L_POLL_VOTED_OPTION'])) ? $this->_rootref['L_POLL_VOTED_OPTION'] : ((isset($user->lang['POLL_VOTED_OPTION'])) ? $user->lang['POLL_VOTED_OPTION'] : '{ POLL_VOTED_OPTION }')); ?>">x</b></td>
					<?php } } ?>

				</tr>
			<?php }} ?>

			</table>
		</td>
	</tr>
<?php if ($this->_rootref['S_CAN_VOTE']) {  ?>

	<tr>
		<td align="center"><span class="gensmall"><?php echo ((isset($this->_rootref['L_MAX_VOTES'])) ? $this->_rootref['L_MAX_VOTES'] : ((isset($user->lang['MAX_VOTES'])) ? $user->lang['MAX_VOTES'] : '{ MAX_VOTES }')); ?></span><br /><br /><input type="submit" name="update" value="<?php echo ((isset($this->_rootref['L_SUBMIT_VOTE'])) ? $this->_rootref['L_SUBMIT_VOTE'] : ((isset($user->lang['SUBMIT_VOTE'])) ? $user->lang['SUBMIT_VOTE'] : '{ SUBMIT_VOTE }')); ?>" class="btnlite" /></td>
	</tr>
<?php } if ($this->_rootref['S_DISPLAY_RESULTS']) {  ?>

	<tr>
		<td class="gensmall" align="center"><b><?php echo ((isset($this->_rootref['L_TOTAL_VOTES'])) ? $this->_rootref['L_TOTAL_VOTES'] : ((isset($user->lang['TOTAL_VOTES'])) ? $user->lang['TOTAL_VOTES'] : '{ TOTAL_VOTES }')); ?> : <?php echo (isset($this->_rootref['TOTAL_VOTES'])) ? $this->_rootref['TOTAL_VOTES'] : ''; ?></b></td>
	</tr>
<?php } else { ?>

	<tr>
		<td align="center"><span class="gensmall"><b><a href="<?php echo (isset($this->_rootref['U_VIEW_RESULTS'])) ? $this->_rootref['U_VIEW_RESULTS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_RESULTS'])) ? $this->_rootref['L_VIEW_RESULTS'] : ((isset($user->lang['VIEW_RESULTS'])) ? $user->lang['VIEW_RESULTS'] : '{ VIEW_RESULTS }')); ?></a></b></span></td>
	</tr>
<?php } ?>

</table>
<?php echo (isset($this->_rootref['S_HIDDEN_FIELDS'])) ? $this->_rootref['S_HIDDEN_FIELDS'] : ''; ?>

</form>
<?php } ?>


<hr />
<table cellspacing="0">
	<tr>
		<td colspan="2" align="center"><a class="gensmall" href="<?php echo (isset($this->_rootref['U_VIEW_OLDER_TOPIC'])) ? $this->_rootref['U_VIEW_OLDER_TOPIC'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_PREVIOUS_TOPIC'])) ? $this->_rootref['L_VIEW_PREVIOUS_TOPIC'] : ((isset($user->lang['VIEW_PREVIOUS_TOPIC'])) ? $user->lang['VIEW_PREVIOUS_TOPIC'] : '{ VIEW_PREVIOUS_TOPIC }')); ?></a><?php if ($this->_rootref['U_VIEW_UNREAD_POST'] && ! $this->_rootref['S_IS_BOT']) {  ?> | <a class="gensmall" href="<?php echo (isset($this->_rootref['U_VIEW_UNREAD_POST'])) ? $this->_rootref['U_VIEW_UNREAD_POST'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_UNREAD_POST'])) ? $this->_rootref['L_VIEW_UNREAD_POST'] : ((isset($user->lang['VIEW_UNREAD_POST'])) ? $user->lang['VIEW_UNREAD_POST'] : '{ VIEW_UNREAD_POST }')); ?></a><?php } ?> | <a class="gensmall" href="<?php echo (isset($this->_rootref['U_VIEW_NEWER_TOPIC'])) ? $this->_rootref['U_VIEW_NEWER_TOPIC'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_NEXT_TOPIC'])) ? $this->_rootref['L_VIEW_NEXT_TOPIC'] : ((isset($user->lang['VIEW_NEXT_TOPIC'])) ? $user->lang['VIEW_NEXT_TOPIC'] : '{ VIEW_NEXT_TOPIC }')); ?></a><br />
			<?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?>&nbsp;[ <?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?> ]
		<?php if ($this->_rootref['TOTAL_POSTS']) {  ?>

			<br /><?php $this->_tpl_include('pagination.html'); } ?>

		</td>
	</tr>
</table>

	<?php if (! $this->_rootref['S_IS_BOT']) {  ?>

<table cellspacing="0">
	<tr>
		<td align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>">
			<?php if ($this->_rootref['S_DISPLAY_POST_INFO']) {  ?><a href="<?php echo (isset($this->_rootref['U_POST_NEW_TOPIC'])) ? $this->_rootref['U_POST_NEW_TOPIC'] : ''; ?>"><strong><?php echo ((isset($this->_rootref['L_POST_NEW_TOPIC'])) ? $this->_rootref['L_POST_NEW_TOPIC'] : ((isset($user->lang['POST_NEW_TOPIC'])) ? $user->lang['POST_NEW_TOPIC'] : '{ POST_NEW_TOPIC }')); ?></strong></a><?php } ?>

		</td>
		<td align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>">
			<?php if ($this->_rootref['S_DISPLAY_REPLY_INFO']) {  ?><a href="<?php echo (isset($this->_rootref['U_POST_REPLY_TOPIC'])) ? $this->_rootref['U_POST_REPLY_TOPIC'] : ''; ?>"><strong><?php echo ((isset($this->_rootref['L_POST_REPLY'])) ? $this->_rootref['L_POST_REPLY'] : ((isset($user->lang['POST_REPLY'])) ? $user->lang['POST_REPLY'] : '{ POST_REPLY }')); ?></strong></a><?php } ?>

		</td>
	</tr>
</table>
	<?php } ?>


<table cellspacing="0">
	<tr>
		<td><b>
		<?php if (! $this->_rootref['S_IS_BOT']) {  if ($this->_rootref['U_WATCH_TOPIC']) {  ?><a href="<?php echo (isset($this->_rootref['U_WATCH_TOPIC'])) ? $this->_rootref['U_WATCH_TOPIC'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_WATCH_TOPIC'])) ? $this->_rootref['L_WATCH_TOPIC'] : ((isset($user->lang['WATCH_TOPIC'])) ? $user->lang['WATCH_TOPIC'] : '{ WATCH_TOPIC }')); ?>"><?php echo ((isset($this->_rootref['L_WATCH_TOPIC'])) ? $this->_rootref['L_WATCH_TOPIC'] : ((isset($user->lang['WATCH_TOPIC'])) ? $user->lang['WATCH_TOPIC'] : '{ WATCH_TOPIC }')); ?></a><?php if ($this->_rootref['U_PRINT_TOPIC'] || $this->_rootref['U_EMAIL_TOPIC'] || $this->_rootref['U_BUMP_TOPIC'] || $this->_rootref['U_BOOKMARK_TOPIC']) {  ?> | <?php } } if ($this->_rootref['U_BOOKMARK_TOPIC']) {  ?><a href="<?php echo (isset($this->_rootref['U_BOOKMARK_TOPIC'])) ? $this->_rootref['U_BOOKMARK_TOPIC'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_BOOKMARK_TOPIC'])) ? $this->_rootref['L_BOOKMARK_TOPIC'] : ((isset($user->lang['BOOKMARK_TOPIC'])) ? $user->lang['BOOKMARK_TOPIC'] : '{ BOOKMARK_TOPIC }')); ?>"><?php echo ((isset($this->_rootref['L_BOOKMARK_TOPIC'])) ? $this->_rootref['L_BOOKMARK_TOPIC'] : ((isset($user->lang['BOOKMARK_TOPIC'])) ? $user->lang['BOOKMARK_TOPIC'] : '{ BOOKMARK_TOPIC }')); ?></a><?php if ($this->_rootref['U_PRINT_TOPIC'] || $this->_rootref['U_EMAIL_TOPIC'] || $this->_rootref['U_BUMP_TOPIC']) {  ?> | <?php } } if ($this->_rootref['U_PRINT_TOPIC']) {  ?><a href="<?php echo (isset($this->_rootref['U_PRINT_TOPIC'])) ? $this->_rootref['U_PRINT_TOPIC'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_PRINT_TOPIC'])) ? $this->_rootref['L_PRINT_TOPIC'] : ((isset($user->lang['PRINT_TOPIC'])) ? $user->lang['PRINT_TOPIC'] : '{ PRINT_TOPIC }')); ?>"><?php echo ((isset($this->_rootref['L_PRINT_TOPIC'])) ? $this->_rootref['L_PRINT_TOPIC'] : ((isset($user->lang['PRINT_TOPIC'])) ? $user->lang['PRINT_TOPIC'] : '{ PRINT_TOPIC }')); ?></a><?php if ($this->_rootref['U_EMAIL_TOPIC'] || $this->_rootref['U_BUMP_TOPIC']) {  ?> | <?php } } if ($this->_rootref['U_EMAIL_TOPIC']) {  ?><a href="<?php echo (isset($this->_rootref['U_EMAIL_TOPIC'])) ? $this->_rootref['U_EMAIL_TOPIC'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_EMAIL_TOPIC'])) ? $this->_rootref['L_EMAIL_TOPIC'] : ((isset($user->lang['EMAIL_TOPIC'])) ? $user->lang['EMAIL_TOPIC'] : '{ EMAIL_TOPIC }')); ?>"><?php echo ((isset($this->_rootref['L_EMAIL_TOPIC'])) ? $this->_rootref['L_EMAIL_TOPIC'] : ((isset($user->lang['EMAIL_TOPIC'])) ? $user->lang['EMAIL_TOPIC'] : '{ EMAIL_TOPIC }')); ?></a><?php if ($this->_rootref['U_BUMP_TOPIC']) {  ?> | <?php } } if ($this->_rootref['U_BUMP_TOPIC']) {  ?><a href="<?php echo (isset($this->_rootref['U_BUMP_TOPIC'])) ? $this->_rootref['U_BUMP_TOPIC'] : ''; ?>" title="<?php echo ((isset($this->_rootref['L_BUMP_TOPIC'])) ? $this->_rootref['L_BUMP_TOPIC'] : ((isset($user->lang['BUMP_TOPIC'])) ? $user->lang['BUMP_TOPIC'] : '{ BUMP_TOPIC }')); ?>"><?php echo ((isset($this->_rootref['L_BUMP_TOPIC'])) ? $this->_rootref['L_BUMP_TOPIC'] : ((isset($user->lang['BUMP_TOPIC'])) ? $user->lang['BUMP_TOPIC'] : '{ BUMP_TOPIC }')); ?></a><?php } } ?></b>
		</td>
	</tr>
</table>

<?php $_postrow_count = (isset($this->_tpldata['postrow'])) ? sizeof($this->_tpldata['postrow']) : 0;if ($_postrow_count) {for ($_postrow_i = 0; $_postrow_i < $_postrow_count; ++$_postrow_i){$_postrow_val = &$this->_tpldata['postrow'][$_postrow_i]; if ($_postrow_val['S_FIRST_ROW']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<th><a class="titles" href="<?php echo (isset($this->_rootref['U_VIEW_TOPIC'])) ? $this->_rootref['U_VIEW_TOPIC'] : ''; ?>"><?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?></a></th>
	</tr>
</table>
<?php } if ($_postrow_val['S_IGNORE_POST']) {  ?>

<hr />
<table cellspacing="0">
	<tr class="row1">
		<td class="gensmall" align="center"><?php if ($_postrow_val['S_FIRST_UNREAD']) {  ?><a name="unread"></a><?php } ?><a name="p<?php echo $_postrow_val['POST_ID']; ?>"></a><?php echo $_postrow_val['L_IGNORE_POST']; ?></td>
	</tr>
</table>
	<?php } else { ?>


<hr />
<table cellspacing="0">
	<tr class="row2">
		<td class="genmed"><?php if ($_postrow_val['POST_ICON_IMG']) {  ?><img src="<?php echo (isset($this->_rootref['T_ICONS_PATH'])) ? $this->_rootref['T_ICONS_PATH'] : ''; echo $_postrow_val['POST_ICON_IMG']; ?>" width="<?php echo $_postrow_val['POST_ICON_IMG_WIDTH']; ?>" height="<?php echo $_postrow_val['POST_ICON_IMG_HEIGHT']; ?>" alt="" title="" /><?php } ?> <?php echo $_postrow_val['POST_SUBJECT']; ?></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr class="row1">
		<td class="profile"<?php if ($_postrow_val['S_LAST_ROW']) {  ?> id="lastpost"<?php } ?>>
			<?php if ($_postrow_val['S_FIRST_UNREAD']) {  ?><a name="unread"></a><?php } ?><a name="p<?php echo $_postrow_val['POST_ID']; ?>"></a><?php if ($_postrow_val['ONLINE_IMG']) {  echo $_postrow_val['ONLINE_IMG']; } ?><strong class="postauthor" style="font-size: 1.2em<?php if ($_postrow_val['POST_AUTHOR_COLOUR']) {  ?>;color: <?php echo $_postrow_val['POST_AUTHOR_COLOUR']; } ?>"> <?php echo $_postrow_val['POST_AUTHOR']; ?></strong> - <?php if ($_postrow_val['S_PROFILE_REAL_NAME']) {  ?><strong class="gensmall"<?php if ($_postrow_val['POST_AUTHOR_COLOUR']) {  ?> style="color: <?php echo $_postrow_val['POST_AUTHOR_COLOUR']; ?>"<?php } ?>><i><?php echo $_postrow_val['PROFILE_REAL_NAME_VALUE']; ?></i></strong><br /><?php } if ($_postrow_val['RANK_TITLE']) {  ?><span><strong class="gensmall"<?php if ($_postrow_val['POST_AUTHOR_COLOUR']) {  ?> style="color: <?php echo $_postrow_val['POST_AUTHOR_COLOUR']; ?>"<?php } ?>><?php echo $_postrow_val['RANK_TITLE']; ?></strong></span><br /><?php } if ($_postrow_val['U_PROFILE']) {  ?><a href="<?php echo $_postrow_val['U_PROFILE']; ?>"><?php echo (isset($this->_rootref['PROFILE_IMG'])) ? $this->_rootref['PROFILE_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_PM']) {  ?><a href="<?php echo $_postrow_val['U_PM']; ?>"><?php echo (isset($this->_rootref['PM_IMG'])) ? $this->_rootref['PM_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_EMAIL']) {  ?><a href="<?php echo $_postrow_val['U_EMAIL']; ?>"><?php echo (isset($this->_rootref['EMAIL_IMG'])) ? $this->_rootref['EMAIL_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_WWW']) {  ?><a href="<?php echo $_postrow_val['U_WWW']; ?>" title="<?php echo ((isset($this->_rootref['L_VISIT_WEBSITE'])) ? $this->_rootref['L_VISIT_WEBSITE'] : ((isset($user->lang['VISIT_WEBSITE'])) ? $user->lang['VISIT_WEBSITE'] : '{ VISIT_WEBSITE }')); ?>: <?php echo $_postrow_val['U_WWW']; ?>"><?php echo (isset($this->_rootref['WWW_IMG'])) ? $this->_rootref['WWW_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_MSN']) {  ?><a href="<?php echo $_postrow_val['U_MSN']; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_MSNM'])) ? $this->_rootref['L_MSNM'] : ((isset($user->lang['MSNM'])) ? $user->lang['MSNM'] : '{ MSNM }')); ?>"><?php echo (isset($this->_rootref['MSNM_IMG'])) ? $this->_rootref['MSNM_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_ICQ']) {  ?><a href="<?php echo $_postrow_val['U_ICQ']; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_ICQ'])) ? $this->_rootref['L_ICQ'] : ((isset($user->lang['ICQ'])) ? $user->lang['ICQ'] : '{ ICQ }')); ?>"><?php echo (isset($this->_rootref['ICQ_IMG'])) ? $this->_rootref['ICQ_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_YIM']) {  ?><a href="<?php echo $_postrow_val['U_YIM']; ?>" onclick="popup(this.href, 780, 550); return false;" title="<?php echo ((isset($this->_rootref['L_YIM'])) ? $this->_rootref['L_YIM'] : ((isset($user->lang['YIM'])) ? $user->lang['YIM'] : '{ YIM }')); ?>"><?php echo (isset($this->_rootref['YIM_IMG'])) ? $this->_rootref['YIM_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_AIM']) {  ?><a href="<?php echo $_postrow_val['U_AIM']; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_AIM'])) ? $this->_rootref['L_AIM'] : ((isset($user->lang['AIM'])) ? $user->lang['AIM'] : '{ AIM }')); ?>"><?php echo (isset($this->_rootref['AIM_IMG'])) ? $this->_rootref['AIM_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_JABBER']) {  ?><a href="<?php echo $_postrow_val['U_JABBER']; ?>" onclick="popup(this.href, 550, 320); return false;" title="<?php echo ((isset($this->_rootref['L_JABBER'])) ? $this->_rootref['L_JABBER'] : ((isset($user->lang['JABBER'])) ? $user->lang['JABBER'] : '{ JABBER }')); ?>"><?php echo (isset($this->_rootref['JABBER_IMG'])) ? $this->_rootref['JABBER_IMG'] : ''; ?></a><?php } ?>

		</td>
	</tr>
	<tr class="row1">
		<td class="gensmall"><?php if ($this->_rootref['S_IS_BOT']) {  echo $_postrow_val['POST_DATE']; ?>&nbsp;<?php echo $_postrow_val['MINI_POST_IMG']; } else { ?><a href="<?php echo $_postrow_val['U_MINI_POST']; ?>"><?php echo $_postrow_val['POST_DATE']; ?>&nbsp;<?php echo $_postrow_val['MINI_POST_IMG']; ?></a><?php } ?></td>
	</tr>
	<tr class="row1">
		<td>
			<?php if ($_postrow_val['S_POST_UNAPPROVED'] || $_postrow_val['S_POST_REPORTED']) {  ?>

			<table cellspacing="0">
				<tr>
					<td class="gensmall"><?php if ($_postrow_val['S_POST_UNAPPROVED']) {  ?><span class="postapprove"><?php echo (isset($this->_rootref['UNAPPROVED_IMG'])) ? $this->_rootref['UNAPPROVED_IMG'] : ''; ?> <a href="<?php echo $_postrow_val['U_MCP_APPROVE']; ?>"><?php echo ((isset($this->_rootref['L_POST_UNAPPROVED'])) ? $this->_rootref['L_POST_UNAPPROVED'] : ((isset($user->lang['POST_UNAPPROVED'])) ? $user->lang['POST_UNAPPROVED'] : '{ POST_UNAPPROVED }')); ?></a></span> <?php } if ($_postrow_val['S_POST_REPORTED']) {  ?><span class="postreported"><?php echo (isset($this->_rootref['REPORTED_IMG'])) ? $this->_rootref['REPORTED_IMG'] : ''; ?> <a href="<?php echo $_postrow_val['U_MCP_REPORT']; ?>"><?php echo ((isset($this->_rootref['L_POST_REPORTED'])) ? $this->_rootref['L_POST_REPORTED'] : ((isset($user->lang['POST_REPORTED'])) ? $user->lang['POST_REPORTED'] : '{ POST_REPORTED }')); ?></a></span><?php } ?></td>
				</tr>
			</table>

		<br clear="all" />
		<?php } ?>


		<div class="postbody"><?php echo $_postrow_val['MESSAGE']; ?></div>
		</td>
	</tr>
</table>

<?php if ($_postrow_val['S_HAS_ATTACHMENTS']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row4"><?php echo ((isset($this->_rootref['L_ATTACHMENTS'])) ? $this->_rootref['L_ATTACHMENTS'] : ((isset($user->lang['ATTACHMENTS'])) ? $user->lang['ATTACHMENTS'] : '{ ATTACHMENTS }')); ?></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<?php $_attachment_count = (isset($_postrow_val['attachment'])) ? sizeof($_postrow_val['attachment']) : 0;if ($_attachment_count) {for ($_attachment_i = 0; $_attachment_i < $_attachment_count; ++$_attachment_i){$_attachment_val = &$_postrow_val['attachment'][$_attachment_i]; ?>

	<tr class="row2">
		<td><?php echo $_attachment_val['DISPLAY_ATTACHMENT']; ?></td>
	</tr>
	<?php }} ?>

</table>
<hr />
<?php } if ($_postrow_val['S_DISPLAY_NOTICE']) {  ?>

			<span class="gensmall error"><br /><br /><?php echo ((isset($this->_rootref['L_DOWNLOAD_NOTICE'])) ? $this->_rootref['L_DOWNLOAD_NOTICE'] : ((isset($user->lang['DOWNLOAD_NOTICE'])) ? $user->lang['DOWNLOAD_NOTICE'] : '{ DOWNLOAD_NOTICE }')); ?></span>
		<?php } if ($_postrow_val['EDITED_MESSAGE'] || $_postrow_val['EDIT_REASON']) {  ?>

			<br /><br />
		<?php if ($_postrow_val['EDIT_REASON']) {  ?>

			<hr />
			<table cellspacing="0">
				<tr class="row3">
					<td class="gensmall"><?php echo $_postrow_val['EDITED_MESSAGE']; ?></th>
				</tr>
			</table>
			<hr />
			<table cellspacing="0">
				<tr class="row1">
					<td class="genmed"><?php echo $_postrow_val['EDIT_REASON']; ?></td>
				</tr>
			</table>
			<hr />
		<?php } else { ?>

			<span class="gensmall"><?php echo $_postrow_val['EDITED_MESSAGE']; ?></span>
		<?php } } if ($_postrow_val['BUMPED_MESSAGE']) {  ?>

			<span class="gensmall"><?php echo $_postrow_val['BUMPED_MESSAGE']; ?></span>
		<?php } ?>


<table cellspacing="0">
	<tr class="row1">
		<td align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>">
			<?php if ($_postrow_val['S_FIRST_ROW'] && ! $_postrow_val['S_LAST_ROW']) {  ?>

				<strong><a href="#lastpost"><?php echo ((isset($this->_rootref['L_LAST_POST'])) ? $this->_rootref['L_LAST_POST'] : ((isset($user->lang['LAST_POST'])) ? $user->lang['LAST_POST'] : '{ LAST_POST }')); ?></a></strong>
			<?php } if ($_postrow_val['S_LAST_ROW'] && ! $_postrow_val['S_FIRST_ROW']) {  ?>

				<strong><a href="#pageheader"><?php echo ((isset($this->_rootref['L_BACK_TO_TOP'])) ? $this->_rootref['L_BACK_TO_TOP'] : ((isset($user->lang['BACK_TO_TOP'])) ? $user->lang['BACK_TO_TOP'] : '{ BACK_TO_TOP }')); ?></a></strong>
			<?php } ?>

		</td>
		<td class="nowrap" align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>">
			<?php if (! $this->_rootref['S_IS_BOT']) {  if ($_postrow_val['U_REPORT']) {  ?><a href="<?php echo $_postrow_val['U_REPORT']; ?>"><?php echo (isset($this->_rootref['REPORT_IMG'])) ? $this->_rootref['REPORT_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_INFO']) {  ?><a href="<?php echo $_postrow_val['U_INFO']; ?>"><?php echo (isset($this->_rootref['INFO_IMG'])) ? $this->_rootref['INFO_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_WARN']) {  ?><a href="<?php echo $_postrow_val['U_WARN']; ?>"><?php echo (isset($this->_rootref['WARN_IMG'])) ? $this->_rootref['WARN_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_DELETE']) {  ?><a href="<?php echo $_postrow_val['U_DELETE']; ?>"><?php echo (isset($this->_rootref['DELETE_IMG'])) ? $this->_rootref['DELETE_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_EDIT']) {  ?><a href="<?php echo $_postrow_val['U_EDIT']; ?>"><?php echo (isset($this->_rootref['EDIT_IMG'])) ? $this->_rootref['EDIT_IMG'] : ''; ?></a>&nbsp; <?php } if ($_postrow_val['U_QUOTE']) {  ?><a href="<?php echo $_postrow_val['U_QUOTE']; ?>"><?php echo (isset($this->_rootref['QUOTE_IMG'])) ? $this->_rootref['QUOTE_IMG'] : ''; ?></a>&nbsp; <?php } } ?>

			</td>
		</tr>
</table>
	<?php } if (! $_postrow_val['S_LAST_ROW']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="spacer"></td>
	</tr>
</table>
<?php } }} ?>


<hr />
	<?php if (! $this->_rootref['S_IS_BOT']) {  ?>

<table cellspacing="0">
	<tr>
		<?php if ($this->_rootref['S_DISPLAY_POST_INFO']) {  ?>

		<td align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_BEGIN'])) ? $this->_rootref['S_CONTENT_FLOW_BEGIN'] : ''; ?>">
			<a href="<?php echo (isset($this->_rootref['U_POST_NEW_TOPIC'])) ? $this->_rootref['U_POST_NEW_TOPIC'] : ''; ?>"><strong><?php echo ((isset($this->_rootref['L_POST_NEW_TOPIC'])) ? $this->_rootref['L_POST_NEW_TOPIC'] : ((isset($user->lang['POST_NEW_TOPIC'])) ? $user->lang['POST_NEW_TOPIC'] : '{ POST_NEW_TOPIC }')); ?></strong></a>&nbsp;
		</td>
		<?php } if ($this->_rootref['S_DISPLAY_REPLY_INFO']) {  ?>

		<td align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>">
			<a href="<?php echo (isset($this->_rootref['U_POST_REPLY_TOPIC'])) ? $this->_rootref['U_POST_REPLY_TOPIC'] : ''; ?>"><strong><?php echo ((isset($this->_rootref['L_POST_REPLY'])) ? $this->_rootref['L_POST_REPLY'] : ((isset($user->lang['POST_REPLY'])) ? $user->lang['POST_REPLY'] : '{ POST_REPLY }')); ?></strong></a>
		<?php } ?>

		</td>
	</tr>
</table>
	<?php } ?>


<table cellspacing="0">
	<tr>
		<td align="center">
		<?php if ($this->_rootref['TOTAL_POSTS']) {  $this->_tpl_include('pagination.html'); ?><br />
		<?php } ?>

			<?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?>&nbsp;[ <?php echo (isset($this->_rootref['TOTAL_POSTS'])) ? $this->_rootref['TOTAL_POSTS'] : ''; ?> ]<br />
			<a class="gensmall" href="<?php echo (isset($this->_rootref['U_VIEW_OLDER_TOPIC'])) ? $this->_rootref['U_VIEW_OLDER_TOPIC'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_PREVIOUS_TOPIC'])) ? $this->_rootref['L_VIEW_PREVIOUS_TOPIC'] : ((isset($user->lang['VIEW_PREVIOUS_TOPIC'])) ? $user->lang['VIEW_PREVIOUS_TOPIC'] : '{ VIEW_PREVIOUS_TOPIC }')); ?></a><?php if ($this->_rootref['U_VIEW_UNREAD_POST'] && ! $this->_rootref['S_IS_BOT']) {  ?> | <a class="gensmall" href="<?php echo (isset($this->_rootref['U_VIEW_UNREAD_POST'])) ? $this->_rootref['U_VIEW_UNREAD_POST'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_UNREAD_POST'])) ? $this->_rootref['L_VIEW_UNREAD_POST'] : ((isset($user->lang['VIEW_UNREAD_POST'])) ? $user->lang['VIEW_UNREAD_POST'] : '{ VIEW_UNREAD_POST }')); ?></a><?php } ?> | <a class="gensmall" href="<?php echo (isset($this->_rootref['U_VIEW_NEWER_TOPIC'])) ? $this->_rootref['U_VIEW_NEWER_TOPIC'] : ''; ?>"><?php echo ((isset($this->_rootref['L_VIEW_NEXT_TOPIC'])) ? $this->_rootref['L_VIEW_NEXT_TOPIC'] : ((isset($user->lang['VIEW_NEXT_TOPIC'])) ? $user->lang['VIEW_NEXT_TOPIC'] : '{ VIEW_NEXT_TOPIC }')); ?></a>
		</td>
	</tr>
</table>

<?php if ($this->_rootref['S_DISPLAY_ONLINE_LIST']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row2"><p class="gensmall"><?php echo (isset($this->_rootref['LOGGED_IN_USER_LIST'])) ? $this->_rootref['LOGGED_IN_USER_LIST'] : ''; ?></p></td>
	</tr>
</table>
<hr />
<br />

<?php } $this->_tpl_include('breadcrumbs.html'); ?>


<hr /><table cellspacing="0">
	<tr>
		<td align="center"><?php if ($this->_rootref['S_TOPIC_MOD']) {  ?><form method="post" action="<?php echo (isset($this->_rootref['S_MOD_ACTION'])) ? $this->_rootref['S_MOD_ACTION'] : ''; ?>"><span class="gensmall"><strong><?php echo ((isset($this->_rootref['L_QUICK_MOD'])) ? $this->_rootref['L_QUICK_MOD'] : ((isset($user->lang['QUICK_MOD'])) ? $user->lang['QUICK_MOD'] : '{ QUICK_MOD }')); ?></strong></span><br />
		<?php echo (isset($this->_rootref['S_TOPIC_MOD'])) ? $this->_rootref['S_TOPIC_MOD'] : ''; ?> <input class="btnlite" type="submit" value="<?php echo ((isset($this->_rootref['L_GO'])) ? $this->_rootref['L_GO'] : ((isset($user->lang['GO'])) ? $user->lang['GO'] : '{ GO }')); ?>" /></form><br /><?php } if ($this->_rootref['S_DISPLAY_SEARCHBOX']) {  $this->_tpl_include('searchbox.html'); } $this->_tpl_include('jumpbox.html'); ?></td>
	</tr>
</table>

<?php $this->_tpl_include('overall_footer.html'); ?>