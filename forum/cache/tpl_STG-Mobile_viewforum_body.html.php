<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); if ($this->_rootref['S_DISPLAY_ACTIVE']) {  ?>

<hr />
<br />

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_ACTIVE_TOPICS'])) ? $this->_rootref['L_ACTIVE_TOPICS'] : ((isset($user->lang['ACTIVE_TOPICS'])) ? $user->lang['ACTIVE_TOPICS'] : '{ ACTIVE_TOPICS }')); ?></th>
	</tr>
</table>			

<?php $_topicrow_count = (isset($this->_tpldata['topicrow'])) ? sizeof($this->_tpldata['topicrow']) : 0;if ($_topicrow_count) {for ($_topicrow_i = 0; $_topicrow_i < $_topicrow_count; ++$_topicrow_i){$_topicrow_val = &$this->_tpldata['topicrow'][$_topicrow_i]; ?>

<hr />
<table cellspacing="0">
	<tr class="row2">
		<td class="genmed"><span><a title="<?php echo ((isset($this->_rootref['L_POSTED'])) ? $this->_rootref['L_POSTED'] : ((isset($user->lang['POSTED'])) ? $user->lang['POSTED'] : '{ POSTED }')); ?>: <?php echo $_topicrow_val['FIRST_POST_TIME']; ?>" href="<?php echo $_topicrow_val['U_VIEW_TOPIC']; ?>" class="topictitle"><?php echo $_topicrow_val['TOPIC_TITLE']; ?></a>
			<?php echo $_topicrow_val['ATTACH_ICON_IMG']; ?> <?php if ($_topicrow_val['S_HAS_POLL'] || $_topicrow_val['S_TOPIC_MOVED']) {  ?><b><?php echo $_topicrow_val['TOPIC_TYPE']; ?></b> <?php } ?>&nbsp;
			<?php if ($_topicrow_val['S_TOPIC_UNAPPROVED'] || $_topicrow_val['S_POSTS_UNAPPROVED']) {  ?>

			<a href="<?php echo $_topicrow_val['U_MCP_QUEUE']; ?>"><?php echo (isset($this->_rootref['UNAPPROVED_IMG'])) ? $this->_rootref['UNAPPROVED_IMG'] : ''; ?></a>&nbsp;
			<?php } if ($_topicrow_val['S_TOPIC_REPORTED']) {  ?>

			<a href="<?php echo $_topicrow_val['U_MCP_REPORT']; ?>"><?php echo (isset($this->_rootref['REPORTED_IMG'])) ? $this->_rootref['REPORTED_IMG'] : ''; ?></a>
			<?php } ?></span></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr class="row1">
		<td><p class="topicauthor"><?php echo ((isset($this->_rootref['L_AUTHOR'])) ? $this->_rootref['L_AUTHOR'] : ((isset($user->lang['AUTHOR'])) ? $user->lang['AUTHOR'] : '{ AUTHOR }')); ?>: <?php echo $_topicrow_val['TOPIC_AUTHOR_FULL']; ?> <br /> <?php echo $_topicrow_val['VIEWS']; ?> <?php echo ((isset($this->_rootref['L_VIEWS'])) ? $this->_rootref['L_VIEWS'] : ((isset($user->lang['VIEWS'])) ? $user->lang['VIEWS'] : '{ VIEWS }')); ?> with <?php echo $_topicrow_val['REPLIES']; ?> <?php echo ((isset($this->_rootref['L_REPLIES'])) ? $this->_rootref['L_REPLIES'] : ((isset($user->lang['REPLIES'])) ? $user->lang['REPLIES'] : '{ REPLIES }')); ?></p>
			<?php if ($_topicrow_val['PAGINATION']) {  ?>

			<p class="gensmall"> [ <?php echo (isset($this->_rootref['GOTO_PAGE_IMG'])) ? $this->_rootref['GOTO_PAGE_IMG'] : ''; echo ((isset($this->_rootref['L_GOTO_PAGE'])) ? $this->_rootref['L_GOTO_PAGE'] : ((isset($user->lang['GOTO_PAGE'])) ? $user->lang['GOTO_PAGE'] : '{ GOTO_PAGE }')); ?>: <?php echo $_topicrow_val['PAGINATION']; ?> ] </p>
			<?php } ?>

			<p class="topicdetails"><?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_topicrow_val['LAST_POST_AUTHOR_FULL']; ?> <a href="<?php echo $_topicrow_val['U_LAST_POST']; ?>"><?php echo (isset($this->_rootref['LAST_POST_IMG'])) ? $this->_rootref['LAST_POST_IMG'] : ''; ?></a></p>
			<p class="topicdetails"><?php echo $_topicrow_val['LAST_POST_TIME']; ?></p>
		</td>
	</tr>
</table>
<?php if (! $_topicrow_val['S_LAST_ROW']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="spacer"></td>
	</tr>
</table>
<?php } }} else { ?>

<hr />
<table cellspacing="0">
	<tr class="row1">
		<td align="center"><span class="gen"><?php if (! $this->_rootref['S_SORT_DAYS']) {  echo ((isset($this->_rootref['L_NO_TOPICS'])) ? $this->_rootref['L_NO_TOPICS'] : ((isset($user->lang['NO_TOPICS'])) ? $user->lang['NO_TOPICS'] : '{ NO_TOPICS }')); } else { echo ((isset($this->_rootref['L_NO_TOPICS_TIME_FRAME'])) ? $this->_rootref['L_NO_TOPICS_TIME_FRAME'] : ((isset($user->lang['NO_TOPICS_TIME_FRAME'])) ? $user->lang['NO_TOPICS_TIME_FRAME'] : '{ NO_TOPICS_TIME_FRAME }')); } ?></span></td>
	</tr>
</table>
<?php } } if ($this->_rootref['S_HAS_SUBFORUM']) {  $this->_tpl_include('forumlist_body.html'); } if ($this->_rootref['S_IS_POSTABLE'] || $this->_rootref['S_NO_READ_ACCESS']) {  ?>

	<div id="pageheader">

		<?php if ($this->_rootref['MODERATORS']) {  ?>

			<p class="moderators"><?php if ($this->_rootref['S_SINGLE_MODERATOR']) {  echo ((isset($this->_rootref['L_MODERATOR'])) ? $this->_rootref['L_MODERATOR'] : ((isset($user->lang['MODERATOR'])) ? $user->lang['MODERATOR'] : '{ MODERATOR }')); } else { echo ((isset($this->_rootref['L_MODERATORS'])) ? $this->_rootref['L_MODERATORS'] : ((isset($user->lang['MODERATORS'])) ? $user->lang['MODERATORS'] : '{ MODERATORS }')); } ?>: <?php echo (isset($this->_rootref['MODERATORS'])) ? $this->_rootref['MODERATORS'] : ''; ?></p>
		<?php } ?>

	</div>
<?php } ?>


<div id="pagecontent">

<?php if ($this->_rootref['S_NO_READ_ACCESS']) {  ?>

<hr />
<table cellspacing="0">
	<tr class="row2">
		<td class="gen" align="center"><?php echo ((isset($this->_rootref['L_NO_READ_ACCESS'])) ? $this->_rootref['L_NO_READ_ACCESS'] : ((isset($user->lang['NO_READ_ACCESS'])) ? $user->lang['NO_READ_ACCESS'] : '{ NO_READ_ACCESS }')); ?></td>
	</tr>
</table>
<?php } if ($this->_rootref['S_DISPLAY_POST_INFO'] || $this->_rootref['TOTAL_TOPICS']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td width="50%"><?php if ($this->_rootref['S_WATCH_FORUM_LINK'] && ! $this->_rootref['S_IS_BOT']) {  ?><a href="<?php echo (isset($this->_rootref['S_WATCH_FORUM_LINK'])) ? $this->_rootref['S_WATCH_FORUM_LINK'] : ''; ?>"><strong><?php echo (isset($this->_rootref['S_WATCH_FORUM_TITLE'])) ? $this->_rootref['S_WATCH_FORUM_TITLE'] : ''; ?></strong></a><?php } ?></td>
		<td width="50%" align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>"><?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['U_MARK_TOPICS']) {  ?><a href="<?php echo (isset($this->_rootref['U_MARK_TOPICS'])) ? $this->_rootref['U_MARK_TOPICS'] : ''; ?>"><strong><?php echo ((isset($this->_rootref['L_MARK_TOPICS_READ'])) ? $this->_rootref['L_MARK_TOPICS_READ'] : ((isset($user->lang['MARK_TOPICS_READ'])) ? $user->lang['MARK_TOPICS_READ'] : '{ MARK_TOPICS_READ }')); ?></strong></a><?php } ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<p class="gensmall" align="center"><?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?>&nbsp;[ <?php echo (isset($this->_rootref['TOTAL_TOPICS'])) ? $this->_rootref['TOTAL_TOPICS'] : ''; ?> ]
		<?php if ($this->_rootref['TOTAL_TOPICS']) {  ?>

			<br /><?php $this->_tpl_include('pagination.html'); } ?></p>
		<?php if ($this->_rootref['S_DISPLAY_POST_INFO'] && ! $this->_rootref['S_IS_BOT']) {  ?>

			<a href="<?php echo (isset($this->_rootref['U_POST_NEW_TOPIC'])) ? $this->_rootref['U_POST_NEW_TOPIC'] : ''; ?>"><strong><?php echo ((isset($this->_rootref['L_POST_NEW_TOPIC'])) ? $this->_rootref['L_POST_NEW_TOPIC'] : ((isset($user->lang['POST_NEW_TOPIC'])) ? $user->lang['POST_NEW_TOPIC'] : '{ POST_NEW_TOPIC }')); ?></strong></a>
		<?php } ?>

		</td>
	</tr>
</table>
<?php } if (! $this->_rootref['S_DISPLAY_ACTIVE'] && ( $this->_rootref['S_IS_POSTABLE'] || sizeof($this->_tpldata['topicrow']) )) {  ?>

<hr />
<table width="100%" cellspacing="0">
	<tr>
		<th><a href="<?php echo (isset($this->_rootref['U_VIEW_FORUM'])) ? $this->_rootref['U_VIEW_FORUM'] : ''; ?>"><?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?></a></th>
	</tr>
</table>

<?php $_topicrow_count = (isset($this->_tpldata['topicrow'])) ? sizeof($this->_tpldata['topicrow']) : 0;if ($_topicrow_count) {for ($_topicrow_i = 0; $_topicrow_i < $_topicrow_count; ++$_topicrow_i){$_topicrow_val = &$this->_tpldata['topicrow'][$_topicrow_i]; if ($_topicrow_val['S_TOPIC_TYPE_SWITCH'] == (1)) {  ?>

<hr />
<table cellspacing="0">
	<tr class="cat">
		<td><strong><?php echo ((isset($this->_rootref['L_ANNOUNCEMENTS'])) ? $this->_rootref['L_ANNOUNCEMENTS'] : ((isset($user->lang['ANNOUNCEMENTS'])) ? $user->lang['ANNOUNCEMENTS'] : '{ ANNOUNCEMENTS }')); ?></strong></td>
	</tr>
</table>
<?php } else if ($_topicrow_val['S_TOPIC_TYPE_SWITCH'] == 0) {  ?>

<br />

<hr />
<table cellspacing="0">
	<tr class="cat">
		<td><strong><?php echo ((isset($this->_rootref['L_TOPICS'])) ? $this->_rootref['L_TOPICS'] : ((isset($user->lang['TOPICS'])) ? $user->lang['TOPICS'] : '{ TOPICS }')); ?></strong></td>
	</tr>
</table>
<?php } ?>

<hr />
<table cellspacing="0">
	<tr class="row2">
		<td><span><?php if ($_topicrow_val['S_UNREAD_TOPIC']) {  ?><a title="<?php echo ((isset($this->_rootref['L_POSTED'])) ? $this->_rootref['L_POSTED'] : ((isset($user->lang['POSTED'])) ? $user->lang['POSTED'] : '{ POSTED }')); ?>: <?php echo $_topicrow_val['FIRST_POST_TIME']; ?>" href="<?php echo $_topicrow_val['U_VIEW_TOPIC']; ?>" class="topictitle_new"><?php echo $_topicrow_val['TOPIC_TITLE']; ?></a> <a href="<?php echo $_topicrow_val['U_NEWEST_POST']; ?>"><?php echo (isset($this->_rootref['NEWEST_POST_IMG'])) ? $this->_rootref['NEWEST_POST_IMG'] : ''; ?></a>&nbsp;<?php } else { ?><a title="<?php echo ((isset($this->_rootref['L_POSTED'])) ? $this->_rootref['L_POSTED'] : ((isset($user->lang['POSTED'])) ? $user->lang['POSTED'] : '{ POSTED }')); ?>: <?php echo $_topicrow_val['FIRST_POST_TIME']; ?>" href="<?php echo $_topicrow_val['U_VIEW_TOPIC']; ?>" class="topictitle"><?php echo $_topicrow_val['TOPIC_TITLE']; ?></a><?php } ?>&nbsp; 
			<?php echo $_topicrow_val['ATTACH_ICON_IMG']; ?> <?php if ($_topicrow_val['S_HAS_POLL'] || $_topicrow_val['S_TOPIC_MOVED']) {  ?><b><?php echo $_topicrow_val['TOPIC_TYPE']; ?></b> <?php } if ($_topicrow_val['S_TOPIC_UNAPPROVED'] || $_topicrow_val['S_POSTS_UNAPPROVED']) {  ?>

			<a href="<?php echo $_topicrow_val['U_MCP_QUEUE']; ?>"><?php echo $_topicrow_val['UNAPPROVED_IMG']; ?></a>&nbsp;
			<?php } if ($_topicrow_val['S_TOPIC_REPORTED']) {  ?>

			<a href="<?php echo $_topicrow_val['U_MCP_REPORT']; ?>"><?php echo (isset($this->_rootref['REPORTED_IMG'])) ? $this->_rootref['REPORTED_IMG'] : ''; ?></a>
			<?php } ?></span></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr class="row1">
		<td><p class="topicauthor"><?php echo ((isset($this->_rootref['L_AUTHOR'])) ? $this->_rootref['L_AUTHOR'] : ((isset($user->lang['AUTHOR'])) ? $user->lang['AUTHOR'] : '{ AUTHOR }')); ?>: <?php echo $_topicrow_val['TOPIC_AUTHOR_FULL']; ?> <br /> <?php echo $_topicrow_val['VIEWS']; ?> <?php echo ((isset($this->_rootref['L_VIEWS'])) ? $this->_rootref['L_VIEWS'] : ((isset($user->lang['VIEWS'])) ? $user->lang['VIEWS'] : '{ VIEWS }')); ?> with <?php echo $_topicrow_val['REPLIES']; ?> <?php echo ((isset($this->_rootref['L_REPLIES'])) ? $this->_rootref['L_REPLIES'] : ((isset($user->lang['REPLIES'])) ? $user->lang['REPLIES'] : '{ REPLIES }')); ?></p>
			<?php if ($_topicrow_val['PAGINATION']) {  ?>

			<p class="gensmall"> [ <?php echo (isset($this->_rootref['GOTO_PAGE_IMG'])) ? $this->_rootref['GOTO_PAGE_IMG'] : ''; echo ((isset($this->_rootref['L_GOTO_PAGE'])) ? $this->_rootref['L_GOTO_PAGE'] : ((isset($user->lang['GOTO_PAGE'])) ? $user->lang['GOTO_PAGE'] : '{ GOTO_PAGE }')); ?>: <?php echo $_topicrow_val['PAGINATION']; ?> ] </p>
			<?php } ?>

			<p class="topicdetails"><?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_topicrow_val['LAST_POST_AUTHOR_FULL']; ?></p>
			<p class="topicdetails"><a href="<?php echo $_topicrow_val['U_LAST_POST']; ?>"><?php echo $_topicrow_val['LAST_POST_TIME']; ?> <?php echo (isset($this->_rootref['LAST_POST_IMG'])) ? $this->_rootref['LAST_POST_IMG'] : ''; ?></a></p></td>
	</tr>
</table>

<?php if (! $_topicrow_val['S_LAST_ROW']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="spacer"></td>
	</tr>
</table>
<?php } } }} else { ?>

<hr />
<table cellspacing="0">
	<?php if ($this->_rootref['S_IS_POSTABLE']) {  ?>

	<tr class="row1">
		<td class="gen" align="center"><?php if (! $this->_rootref['S_SORT_DAYS']) {  echo ((isset($this->_rootref['L_NO_TOPICS'])) ? $this->_rootref['L_NO_TOPICS'] : ((isset($user->lang['NO_TOPICS'])) ? $user->lang['NO_TOPICS'] : '{ NO_TOPICS }')); } else { echo ((isset($this->_rootref['L_NO_TOPICS_TIME_FRAME'])) ? $this->_rootref['L_NO_TOPICS_TIME_FRAME'] : ((isset($user->lang['NO_TOPICS_TIME_FRAME'])) ? $user->lang['NO_TOPICS_TIME_FRAME'] : '{ NO_TOPICS_TIME_FRAME }')); } ?></td>
	</tr>
</table>
<?php } } if ($this->_rootref['S_DISPLAY_POST_INFO'] || $this->_rootref['TOTAL_TOPICS']) {  ?>

<hr />
<table cellspacing="0">
		<?php if ($this->_rootref['S_DISPLAY_POST_INFO'] && ! $this->_rootref['S_IS_BOT']) {  ?>

	<tr>
		<td colspan="2">
			<a href="<?php echo (isset($this->_rootref['U_POST_NEW_TOPIC'])) ? $this->_rootref['U_POST_NEW_TOPIC'] : ''; ?>"><strong><?php echo ((isset($this->_rootref['L_POST_NEW_TOPIC'])) ? $this->_rootref['L_POST_NEW_TOPIC'] : ((isset($user->lang['POST_NEW_TOPIC'])) ? $user->lang['POST_NEW_TOPIC'] : '{ POST_NEW_TOPIC }')); ?></strong></a>
		<p class="gensmall" align="center">
		<?php if ($this->_rootref['TOTAL_TOPICS']) {  $this->_tpl_include('pagination.html'); ?><br />
		<?php } ?>

			<?php echo (isset($this->_rootref['PAGE_NUMBER'])) ? $this->_rootref['PAGE_NUMBER'] : ''; ?>&nbsp;[ <?php echo (isset($this->_rootref['TOTAL_TOPICS'])) ? $this->_rootref['TOTAL_TOPICS'] : ''; ?> ]</p>
		</td>
	</tr>
		<?php } ?>

	<tr>
		<td width="50%"><?php if ($this->_rootref['S_WATCH_FORUM_LINK'] && ! $this->_rootref['S_IS_BOT']) {  ?><a href="<?php echo (isset($this->_rootref['S_WATCH_FORUM_LINK'])) ? $this->_rootref['S_WATCH_FORUM_LINK'] : ''; ?>"><strong><?php echo (isset($this->_rootref['S_WATCH_FORUM_TITLE'])) ? $this->_rootref['S_WATCH_FORUM_TITLE'] : ''; ?></strong></a><?php } ?></td>
		<td width="50%" align="<?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>"><?php if (! $this->_rootref['S_IS_BOT'] && $this->_rootref['U_MARK_TOPICS']) {  ?><a href="<?php echo (isset($this->_rootref['U_MARK_TOPICS'])) ? $this->_rootref['U_MARK_TOPICS'] : ''; ?>"><strong><?php echo ((isset($this->_rootref['L_MARK_TOPICS_READ'])) ? $this->_rootref['L_MARK_TOPICS_READ'] : ((isset($user->lang['MARK_TOPICS_READ'])) ? $user->lang['MARK_TOPICS_READ'] : '{ MARK_TOPICS_READ }')); ?></strong></a><?php } ?></td>
	</tr>
</table>
<?php } ?>


<table cellspacing="0">
	<tr>
		<td align="center">
			<form method="post" action="<?php echo (isset($this->_rootref['S_FORUM_ACTION'])) ? $this->_rootref['S_FORUM_ACTION'] : ''; ?>"><span class="gensmall"><?php echo ((isset($this->_rootref['L_DISPLAY_TOPICS'])) ? $this->_rootref['L_DISPLAY_TOPICS'] : ((isset($user->lang['DISPLAY_TOPICS'])) ? $user->lang['DISPLAY_TOPICS'] : '{ DISPLAY_TOPICS }')); ?>:</span> <?php echo (isset($this->_rootref['S_SELECT_SORT_DAYS'])) ? $this->_rootref['S_SELECT_SORT_DAYS'] : ''; ?><br /><br /><span class="gensmall"><?php echo ((isset($this->_rootref['L_SORT_BY'])) ? $this->_rootref['L_SORT_BY'] : ((isset($user->lang['SORT_BY'])) ? $user->lang['SORT_BY'] : '{ SORT_BY }')); ?></span> <?php echo (isset($this->_rootref['S_SELECT_SORT_KEY'])) ? $this->_rootref['S_SELECT_SORT_KEY'] : ''; ?> <?php echo (isset($this->_rootref['S_SELECT_SORT_DIR'])) ? $this->_rootref['S_SELECT_SORT_DIR'] : ''; ?><br /><br /><input class="btnlite" type="submit" name="sort" value="<?php echo ((isset($this->_rootref['L_GO'])) ? $this->_rootref['L_GO'] : ((isset($user->lang['GO'])) ? $user->lang['GO'] : '{ GO }')); ?>" /></form>
		</td>
	</tr>
</table>

<?php if ($this->_rootref['S_DISPLAY_ONLINE_LIST']) {  ?>

<hr />
<table cellspacing="0">
	<tr class="row2">
		<td class="gensmall"><?php echo (isset($this->_rootref['LOGGED_IN_USER_LIST'])) ? $this->_rootref['LOGGED_IN_USER_LIST'] : ''; ?></td>
	</tr>
</table>
<hr />
<br />

<?php } $this->_tpl_include('breadcrumbs.html'); ?>

<hr />
<table cellspacing="0">
	<tr>
		<td align="center"><?php if ($this->_rootref['S_DISPLAY_SEARCHBOX']) {  $this->_tpl_include('searchbox.html'); } $this->_tpl_include('jumpbox.html'); ?></td>
	</tr>
</table>

<?php $this->_tpl_include('overall_footer.html'); ?>