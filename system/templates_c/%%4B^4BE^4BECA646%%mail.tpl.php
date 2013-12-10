<?php /* Smarty version 2.6.10, created on 2005-11-19 02:36:15
         compiled from wml/mail.tpl */ ?>
<tr><td>
<?php if ($this->_tpl_vars['sitedata']['mail'] == 'nov'): ?>

Posalji email sa atacmentom.<br/>
<do type="options" label="posalji">
<go method="get" href="?put=mail<?php echo $this->_tpl_vars['atr']; ?>
">
	<postfield name="Submit" value="1"/>
	<postfield name="put" value='mail'/>
	<postfield name="sta1" value='<?php echo $_GET['sta1']; ?>
'/>
	<postfield name="sta2" value='<?php echo $_GET['sta2']; ?>
'/>
	<postfield name="sid" value='<?php echo $this->_tpl_vars['userdata']['session_id']; ?>
'/>
</go></do>
  Fajl: <?php echo $_GET['sta2']; ?>
<br/>
  Email:
<input type="text" name="za" value="@063.mobtel.com"/><br/>


<a href="?put=mail<?php echo $this->_tpl_vars['atr']; ?>
&amp;sta1=<?php echo $_GET['sta1']; ?>
&amp;sta2=<?php echo $_GET['sta2']; ?>
&amp;za=$(za)&amp;Submit=1">Posalji</a>

<?php else: ?>
<?php echo $this->_tpl_vars['sitedata']['mail']; ?>

<?php endif; ?>
</td></tr>