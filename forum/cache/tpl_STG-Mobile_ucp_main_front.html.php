<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('ucp_header.html'); ?>


<hr />
<br />

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_UCP'])) ? $this->_rootref['L_UCP'] : ((isset($user->lang['UCP'])) ? $user->lang['UCP'] : '{ UCP }')); ?></th>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row1"><p class="genmed"><?php echo ((isset($this->_rootref['L_UCP_WELCOME'])) ? $this->_rootref['L_UCP_WELCOME'] : ((isset($user->lang['UCP_WELCOME'])) ? $user->lang['UCP_WELCOME'] : '{ UCP_WELCOME }')); ?></p></td>
	</tr>
</table>

<hr />
<br />

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_IMPORTANT_NEWS'])) ? $this->_rootref['L_IMPORTANT_NEWS'] : ((isset($user->lang['IMPORTANT_NEWS'])) ? $user->lang['IMPORTANT_NEWS'] : '{ IMPORTANT_NEWS }')); ?></th>
	</tr>
</table>

<?php $_topicrow_count = (isset($this->_tpldata['topicrow'])) ? sizeof($this->_tpldata['topicrow']) : 0;if ($_topicrow_count) {for ($_topicrow_i = 0; $_topicrow_i < $_topicrow_count; ++$_topicrow_i){$_topicrow_val = &$this->_tpldata['topicrow'][$_topicrow_i]; ?>


<hr />
<table cellspacing="0">
	<tr>
		<td class="row2"><p class="topictitle"><?php if ($_topicrow_val['S_UNREAD']) {  ?><a href="<?php echo $_topicrow_val['U_NEWEST_POST']; ?>"><?php echo (isset($this->_rootref['NEWEST_POST_IMG'])) ? $this->_rootref['NEWEST_POST_IMG'] : ''; ?></a> <?php } ?> <a href="<?php echo $_topicrow_val['U_VIEW_TOPIC']; ?>"><?php echo $_topicrow_val['TOPIC_TITLE']; ?></a></p></td>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row1"><p class="topicdetails"><?php echo ((isset($this->_rootref['L_POST_BY_AUTHOR'])) ? $this->_rootref['L_POST_BY_AUTHOR'] : ((isset($user->lang['POST_BY_AUTHOR'])) ? $user->lang['POST_BY_AUTHOR'] : '{ POST_BY_AUTHOR }')); ?> <?php echo $_topicrow_val['LAST_POST_AUTHOR_FULL']; ?></p>
			<p class="gensmall"><?php echo $_topicrow_val['GOTO_PAGE']; ?></p>
			<p class="topicdetails"><a href="<?php echo $_topicrow_val['U_LAST_POST']; ?>"><?php echo $_topicrow_val['LAST_POST_TIME']; ?>

				<?php echo (isset($this->_rootref['LAST_POST_IMG'])) ? $this->_rootref['LAST_POST_IMG'] : ''; ?></a></p></td>
	</tr>
</table>

<?php if (! $_topicrow_val['S_LAST_ROW']) {  ?>

<hr />
<div class="spacer"></div>
<?php } }} else { ?>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row2" align="center"><b class="gen"><?php echo ((isset($this->_rootref['L_NO_IMPORTANT_NEWS'])) ? $this->_rootref['L_NO_IMPORTANT_NEWS'] : ((isset($user->lang['NO_IMPORTANT_NEWS'])) ? $user->lang['NO_IMPORTANT_NEWS'] : '{ NO_IMPORTANT_NEWS }')); ?></b></td>
	</tr>
</table>
<?php } ?>


<hr />
<br />

<hr />
<table cellspacing="0">
	<tr>
		<th><?php echo ((isset($this->_rootref['L_YOUR_DETAILS'])) ? $this->_rootref['L_YOUR_DETAILS'] : ((isset($user->lang['YOUR_DETAILS'])) ? $user->lang['YOUR_DETAILS'] : '{ YOUR_DETAILS }')); ?></th>
	</tr>
</table>

<hr />
<table cellspacing="0">
	<tr>
		<td class="row1"><b class="genmed"><?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?>: </b><br />
			<span class="gen"><?php echo (isset($this->_rootref['JOINED'])) ? $this->_rootref['JOINED'] : ''; ?></span>
		<div class="spacer"></div>
			<b class="genmed"><?php echo ((isset($this->_rootref['L_TOTAL_POSTS'])) ? $this->_rootref['L_TOTAL_POSTS'] : ((isset($user->lang['TOTAL_POSTS'])) ? $user->lang['TOTAL_POSTS'] : '{ TOTAL_POSTS }')); ?>: </b><?php if ($this->_rootref['POSTS_PCT']) {  ?><b class="gen"><?php echo (isset($this->_rootref['POSTS'])) ? $this->_rootref['POSTS'] : ''; ?></b><br />
			<span class="genmed">(<?php echo (isset($this->_rootref['POSTS_PCT'])) ? $this->_rootref['POSTS_PCT'] : ''; ?> / <?php echo (isset($this->_rootref['POSTS_DAY'])) ? $this->_rootref['POSTS_DAY'] : ''; ?>)<br />
			[ <a href="<?php echo (isset($this->_rootref['U_SEARCH_SELF'])) ? $this->_rootref['U_SEARCH_SELF'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SEARCH_YOUR_POSTS'])) ? $this->_rootref['L_SEARCH_YOUR_POSTS'] : ((isset($user->lang['SEARCH_YOUR_POSTS'])) ? $user->lang['SEARCH_YOUR_POSTS'] : '{ SEARCH_YOUR_POSTS }')); ?></a> ]</span><?php } else { ?><b class="gen"><?php echo (isset($this->_rootref['POSTS'])) ? $this->_rootref['POSTS'] : ''; ?><b><?php } if ($this->_rootref['S_SHOW_ACTIVITY']) {  ?>

		<div class="spacer"></div>
			<b class="genmed"><?php echo ((isset($this->_rootref['L_ACTIVE_IN_FORUM'])) ? $this->_rootref['L_ACTIVE_IN_FORUM'] : ((isset($user->lang['ACTIVE_IN_FORUM'])) ? $user->lang['ACTIVE_IN_FORUM'] : '{ ACTIVE_IN_FORUM }')); ?>: </b><?php if ($this->_rootref['ACTIVE_FORUM']) {  ?><br />
			<b><a class="gen" href="<?php echo (isset($this->_rootref['U_ACTIVE_FORUM'])) ? $this->_rootref['U_ACTIVE_FORUM'] : ''; ?>"><?php echo (isset($this->_rootref['ACTIVE_FORUM'])) ? $this->_rootref['ACTIVE_FORUM'] : ''; ?></a></b><br />
			<span class="genmed">(<?php echo (isset($this->_rootref['ACTIVE_FORUM_POSTS'])) ? $this->_rootref['ACTIVE_FORUM_POSTS'] : ''; ?> / <?php echo (isset($this->_rootref['ACTIVE_FORUM_PCT'])) ? $this->_rootref['ACTIVE_FORUM_PCT'] : ''; ?>)</span><?php } else { ?><span class="gen">-</span><?php } ?>

		<div class="spacer"></div>
			<b class="genmed"><?php echo ((isset($this->_rootref['L_ACTIVE_IN_TOPIC'])) ? $this->_rootref['L_ACTIVE_IN_TOPIC'] : ((isset($user->lang['ACTIVE_IN_TOPIC'])) ? $user->lang['ACTIVE_IN_TOPIC'] : '{ ACTIVE_IN_TOPIC }')); ?>: </b><br />
		<?php if ($this->_rootref['ACTIVE_TOPIC']) {  ?>

			<b><a class="gen" href="<?php echo (isset($this->_rootref['U_ACTIVE_TOPIC'])) ? $this->_rootref['U_ACTIVE_TOPIC'] : ''; ?>"><?php echo (isset($this->_rootref['ACTIVE_TOPIC'])) ? $this->_rootref['ACTIVE_TOPIC'] : ''; ?></a></b><br />
			<span class="genmed">(<?php echo (isset($this->_rootref['ACTIVE_TOPIC_POSTS'])) ? $this->_rootref['ACTIVE_TOPIC_POSTS'] : ''; ?> / <?php echo (isset($this->_rootref['ACTIVE_TOPIC_PCT'])) ? $this->_rootref['ACTIVE_TOPIC_PCT'] : ''; ?>)</span><?php } else { ?><span class="gen">-</span>
		<?php } } if ($this->_rootref['WARNINGS']) {  ?>

			<div class="spacer"></div>
			<b class="genmed"><?php echo ((isset($this->_rootref['L_YOUR_WARNINGS'])) ? $this->_rootref['L_YOUR_WARNINGS'] : ((isset($user->lang['YOUR_WARNINGS'])) ? $user->lang['YOUR_WARNINGS'] : '{ YOUR_WARNINGS }')); ?>: </b><?php echo (isset($this->_rootref['WARNING_IMG'])) ? $this->_rootref['WARNING_IMG'] : ''; ?> [ <b><?php echo (isset($this->_rootref['WARNINGS'])) ? $this->_rootref['WARNINGS'] : ''; ?></b> ]
	<?php } ?>

		</td>
	</tr>
</table>

<hr />
<br />

<?php $this->_tpl_include('ucp_footer.html'); ?>