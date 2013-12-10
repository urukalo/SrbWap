<?php if (!defined('IN_PHPBB')) exit; ?><table cellspacing="0" width="100%" >

<?php $_forumrow_count = (isset($this->_tpldata['forumrow'])) ? sizeof($this->_tpldata['forumrow']) : 0;if ($_forumrow_count) {for ($_forumrow_i = 0; $_forumrow_i < $_forumrow_count; ++$_forumrow_i){$_forumrow_val = &$this->_tpldata['forumrow'][$_forumrow_i]; if ($_forumrow_val['S_IS_CAT']) {  ?>
		<tr>
			<td><p><a href="<?php echo $_forumrow_val['U_VIEWFORUM']; ?>"><?php echo $_forumrow_val['FORUM_NAME']; ?></a></p></td>
			
		</tr>
	<?php } else if ($_forumrow_val['S_IS_LINK']) {  ?>

		<tr>
			<td width="50" align="center"><?php echo $_forumrow_val['FORUM_FOLDER_IMG']; ?></td>
			<td>
				<?php if ($_forumrow_val['FORUM_IMAGE']) {  ?>
					<?php echo $_forumrow_val['FORUM_IMAGE']; ?>
				<?php } ?>
				<a href="<?php echo $_forumrow_val['U_VIEWFORUM']; ?>"><?php echo $_forumrow_val['FORUM_NAME']; ?></a>
				<p><?php echo $_forumrow_val['FORUM_DESC']; ?></p>
			</td>
			<?php if ($_forumrow_val['CLICKS']) {  ?>
				<td colspan="3" align="center"><?php echo ((isset($this->_rootref['L_REDIRECTS'])) ? $this->_rootref['L_REDIRECTS'] : ((isset($user->lang['REDIRECTS'])) ? $user->lang['REDIRECTS'] : '{ REDIRECTS }')); ?>: <?php echo $_forumrow_val['CLICKS']; ?></td>
			<?php } else { ?>
				<td colspan="3" align="center">&nbsp;</td>
			<?php } ?>
		</tr>
	<?php } else { if ($_forumrow_val['S_NO_CAT']) {  ?>
			<tr>
				<td colspan="2"><h4><?php echo ((isset($this->_rootref['L_FORUM'])) ? $this->_rootref['L_FORUM'] : ((isset($user->lang['FORUM'])) ? $user->lang['FORUM'] : '{ FORUM }')); ?></h4></td>
				<td colspan="3">&nbsp;</td>
			</tr>
		<?php } if ($this->_rootref['S_DISPLAY_BIRTHDAY_LIST']) {  } else { ?>
		<tr>
			<td width="50" align="center"><?php echo $_forumrow_val['FORUM_FOLDER_IMG']; ?></td>
			<td width="100%"><p>
				<?php if ($_forumrow_val['FORUM_IMAGE']) {  ?>
					<?php echo $_forumrow_val['FORUM_IMAGE']; ?>
				<?php } ?>
				<a href="<?php echo $_forumrow_val['U_VIEWFORUM']; ?>"><?php echo $_forumrow_val['FORUM_NAME']; ?></a> (<?php echo $_forumrow_val['TOPICS']; ?>/<?php echo $_forumrow_val['POSTS']; ?>)
                <br/>
				<i>[<?php echo $_forumrow_val['FORUM_DESC']; ?>]</i>
                <?php if ($_forumrow_val['MODERATORS']) {  ?>
					<br/>(<strong><?php echo $_forumrow_val['L_MODERATOR_STR']; ?>:</strong> <?php echo $_forumrow_val['MODERATORS']; ?>)
				<?php } if ($_forumrow_val['SUBFORUMS'] && $_forumrow_val['S_LIST_SUBFORUMS']) {  ?>
					<strong><?php echo $_forumrow_val['L_SUBFORUM_STR']; ?></strong> <?php echo $_forumrow_val['SUBFORUMS']; ?><br/>
				<?php } if ($_forumrow_val['LAST_POST_TIME']) {  if ($_forumrow_val['U_UNAPPROVED_TOPICS']) {  ?><a href="<?php echo $_forumrow_val['U_UNAPPROVED_TOPICS']; ?>"><?php echo (isset($this->_rootref['UNAPPROVED_IMG'])) ? $this->_rootref['UNAPPROVED_IMG'] : ''; ?></a>&nbsp;<?php } ?>				
                    <br/> <?php echo $_forumrow_val['LAST_POSTER_FULL']; ?> [<?php echo $_forumrow_val['LAST_POST_TIME']; ?>]
						<?php if (! $this->_rootref['S_IS_BOT']) {  ?><a href="<?php echo $_forumrow_val['U_LAST_POST']; ?>"><?php echo (isset($this->_rootref['LAST_POST_IMG'])) ? $this->_rootref['LAST_POST_IMG'] : ''; ?></a><?php } } else { ?>
					<?php echo ((isset($this->_rootref['L_NO_POSTS'])) ? $this->_rootref['L_NO_POSTS'] : ((isset($user->lang['NO_POSTS'])) ? $user->lang['NO_POSTS'] : '{ NO_POSTS }')); ?>
				<?php } ?>
			</p></td>
		</tr>
        <?php } } }} else { ?>
	<tr>
		<td colspan="5" align="center"><p><?php echo ((isset($this->_rootref['L_NO_FORUMS'])) ? $this->_rootref['L_NO_FORUMS'] : ((isset($user->lang['NO_FORUMS'])) ? $user->lang['NO_FORUMS'] : '{ NO_FORUMS }')); ?></p></td>
	</tr>
<?php } ?>
</table>