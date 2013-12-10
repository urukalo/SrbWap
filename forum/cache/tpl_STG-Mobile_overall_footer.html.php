<?php if (!defined('IN_PHPBB')) exit; if (! $this->_rootref['S_IS_BOT']) {  echo (isset($this->_rootref['RUN_CRON_TASK'])) ? $this->_rootref['RUN_CRON_TASK'] : ''; } ?>


<!--
	We request you retain the full copyright notice below including the link to www.phpbb.com.
	This not only gives respect to the large amount of time given freely by the developers
	but also helps build interest, traffic and use of phpBB3. If you (honestly) cannot retain
	the full copyright we ask you at least leave in place the "Powered by phpBB" line, with
	"phpBB" linked to www.phpbb.com. If you refuse to include even this then support on our
	forums may be affected.

	The phpBB Group : 2006
//-->

<?php if ($this->_rootref['S_USER_LOGGED_IN']) {  ?>

<table cellspacing="0">
	<tr>
		<td class="genmed" align="center">
			<a href="<?php echo (isset($this->_rootref['U_PROFILE'])) ? $this->_rootref['U_PROFILE'] : ''; ?>">UCP</a>
			<?php if ($this->_rootref['U_MCP']) {  ?> &bull; <a href="<?php echo (isset($this->_rootref['U_MCP'])) ? $this->_rootref['U_MCP'] : ''; ?>">MCP</a><?php } if ($this->_rootref['U_ACP']) {  ?> &bull; <a href="<?php echo (isset($this->_rootref['U_ACP'])) ? $this->_rootref['U_ACP'] : ''; ?>">ACP</a><?php } ?>

		</td>
	</tr>
</table>
<?php } else { ?>

<br />
<?php } ?>



<hr />
<table cellspacing="0">
	<tr>
		<td class="row5 copyright" align="center">
			STG-Mobile Style &copy; 2008 <a class="copyright" href="http://startrekguide.com/">STG</a><br />
			Powered by <a class="copyright" href="http://www.phpbb.com/">phpBB</a><br />&copy; 2000, 2002, 2005, 2007 phpBB Group<br />
			phpBB-Mobile &copy; 2008 <a class="copyright" href="http://startrekguide.com/">STG</a>
			<?php if ($this->_rootref['TRANSLATION_INFO']) {  ?><br /><?php echo (isset($this->_rootref['TRANSLATION_INFO'])) ? $this->_rootref['TRANSLATION_INFO'] : ''; } ?>

		</td>
	</tr>
</table>
<hr />


</body>
</html>