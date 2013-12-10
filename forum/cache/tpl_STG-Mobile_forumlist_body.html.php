<?php if (!defined('IN_PHPBB')) exit; $_forumrow_count = (isset($this->_tpldata['forumrow'])) ? sizeof($this->_tpldata['forumrow']) : 0;if ($_forumrow_count) {for ($_forumrow_i = 0; $_forumrow_i < $_forumrow_count; ++$_forumrow_i){$_forumrow_val = &$this->_tpldata['forumrow'][$_forumrow_i]; if (! $_forumrow_val['S_IS_CAT'] && $_forumrow_val['S_FIRST_ROW']) {  ?>

<hr />
<br />

<hr />
<table cellspacing="0">
	<tr>
	      <th><a href="<?php echo $_forumrow_val['U_VIEWFORUM']; ?>"><?php echo ((isset($this->_rootref['L_SUBFORUMS'])) ? $this->_rootref['L_SUBFORUMS'] : ((isset($user->lang['SUBFORUMS'])) ? $user->lang['SUBFORUMS'] : '{ SUBFORUMS }')); ?></a></th>
	</tr>
</table>
  <?php } if ($_forumrow_val['S_IS_CAT']) {  if (! $_forumrow_val['S_FIRST_ROW']) {  ?>

<br />

<hr />
<table cellspacing="0">
	<tr>
	      <th><a href="<?php echo $_forumrow_val['U_VIEWFORUM']; ?>"><?php echo $_forumrow_val['FORUM_NAME']; ?></a></th>
	</tr>
</table>
<?php } else { ?>

<hr />
<table cellspacing="0">
	<tr>
	      <th><a href="<?php echo $_forumrow_val['U_VIEWFORUM']; ?>"><?php echo $_forumrow_val['FORUM_NAME']; ?></a></th>
	</tr>
</table>
<?php } } else if ($_forumrow_val['S_IS_LINK']) {  ?>

<hr />
<table cellspacing="0">
	<tr class="row2">
		<td>
			<a class="<?php if ($_forumrow_val['S_UNREAD_FORUM']) {  ?>forumtitle_new<?php } else { ?>forumtitle<?php } ?>" href="<?php echo $_forumrow_val['U_VIEWFORUM']; ?>"><?php echo $_forumrow_val['FORUM_NAME']; ?></a>
		</td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr class="row1">
		<td>
		<?php if ($_forumrow_val['CLICKS']) {  ?>

			<span class="genmed"><?php echo ((isset($this->_rootref['L_REDIRECTS'])) ? $this->_rootref['L_REDIRECTS'] : ((isset($user->lang['REDIRECTS'])) ? $user->lang['REDIRECTS'] : '{ REDIRECTS }')); ?>: <?php echo $_forumrow_val['CLICKS']; ?></span>
		<?php } else { ?>

			<span class="genmed"><strong><?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?></strong></span>
		<?php } ?>

		</td>
	</tr>
</table>

<?php } else { if ($_forumrow_val['S_NO_CAT']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_SUBFORUMS'])) ? $this->_rootref['L_SUBFORUMS'] : ((isset($user->lang['SUBFORUMS'])) ? $user->lang['SUBFORUMS'] : '{ SUBFORUMS }')); ?></th>
	</tr>
</table>
<?php } if (! $this->_rootref['S_DISPLAY_BIRTHDAY_LIST']) {  ?>


<hr />
<table cellspacing="0">
	<tr class="row2">
		<td>
			<a class="<?php if ($_forumrow_val['S_UNREAD_FORUM']) {  ?>forumlink_new<?php } else { ?>forumlink<?php } ?>" href="<?php echo $_forumrow_val['U_VIEWFORUM']; ?>"><?php echo $_forumrow_val['FORUM_NAME']; ?></a>
		</td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr class="row1">
		<td>
			<?php if ($_forumrow_val['FORUM_DESC']) {  ?>

			<p class="topicdetails"><?php echo $_forumrow_val['FORUM_DESC']; ?></p>
			<?php } ?>

			<p class="topicdetails"><?php echo $_forumrow_val['TOPICS']; ?> <?php echo ((isset($this->_rootref['L_TOPICS'])) ? $this->_rootref['L_TOPICS'] : ((isset($user->lang['TOPICS'])) ? $user->lang['TOPICS'] : '{ TOPICS }')); ?> with <?php echo $_forumrow_val['POSTS']; ?> <?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?></p>
			<?php if ($_forumrow_val['SUBFORUMS'] && $_forumrow_val['S_LIST_SUBFORUMS']) {  ?>

			<p class="topicdetails"><strong><?php echo $_forumrow_val['L_SUBFORUM_STR']; ?></strong> <?php echo $_forumrow_val['SUBFORUMS']; ?></p>
			<?php } if ($_forumrow_val['LAST_POST_TIME']) {  ?>

			<p class="topicdetails"><a href="<?php echo $_forumrow_val['U_LAST_POST']; ?>" title="<?php echo ((isset($this->_rootref['L_VIEW_LATEST_POST'])) ? $this->_rootref['L_VIEW_LATEST_POST'] : ((isset($user->lang['VIEW_LATEST_POST'])) ? $user->lang['VIEW_LATEST_POST'] : '{ VIEW_LATEST_POST }')); ?>"> <?php echo $_forumrow_val['LAST_POST_SUBJECT']; ?> <?php echo (isset($this->_rootref['LAST_POST_IMG'])) ? $this->_rootref['LAST_POST_IMG'] : ''; ?></a></p>
			<p class="topicauthor"><?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_forumrow_val['LAST_POSTER_FULL']; ?></p>
			<p class="topicdetails"><?php echo $_forumrow_val['LAST_POST_TIME']; ?></p>
			<?php } else { ?>

			<p class="topicdetails"><?php echo ((isset($this->_rootref['L_NO_POSTS'])) ? $this->_rootref['L_NO_POSTS'] : ((isset($user->lang['NO_POSTS'])) ? $user->lang['NO_POSTS'] : '{ NO_POSTS }')); ?></p>
			<?php } ?>

		</td>
	</tr>
</table>




<?php if (! $_forumrow_val['S_LAST_ROW']) {  ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="spacer"></td>
	</tr>
</table>
<?php } } } }} else { ?>

<hr />
<table cellspacing="0">
	<tr class="row2">
		<td class="gensmall" align="center"><?php echo ((isset($this->_rootref['L_NO_FORUMS'])) ? $this->_rootref['L_NO_FORUMS'] : ((isset($user->lang['NO_FORUMS'])) ? $user->lang['NO_FORUMS'] : '{ NO_FORUMS }')); ?></td>
	</tr>
</table>
<?php } ?>