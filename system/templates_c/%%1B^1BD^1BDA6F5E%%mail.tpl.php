<?php /* Smarty version 2.6.10, created on 2005-12-12 13:27:24
         compiled from xhtml/mail.tpl */ ?>
<tr><td>
<?php if ($this->_tpl_vars['sitedata']['mail'] == 'nov'): ?>
Posalji email sa atacmentom.<br/>
<form action="?put=mail" method="get">
  Fajl: <?php echo $_GET['sta2']; ?>
<br/>
  Email:
<input type="text" name="za" value="@063.mobtel.com"/><br/>

  <input type='hidden' name="put" value='mail'/>
  <input type='hidden' name="sta1" value='<?php echo $_GET['sta1']; ?>
'/>
  <input type='hidden' name="sta2" value='<?php echo $_GET['sta2']; ?>
'/>
  <input type='hidden' name="sid" value='<?php echo $this->_tpl_vars['userdata']['session_id']; ?>
'/>
  <input type='submit' name="Submit" value='Posalji'/>
</form>
<?php else: ?>
<?php echo $this->_tpl_vars['sitedata']['mail']; ?>

<?php endif; ?>
</td></tr>