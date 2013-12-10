<?php /* Smarty version 2.6.10, created on 2009-12-04 13:35:10
         compiled from xhtml/header.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="utf-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN"
    "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
<title><?php echo $this->_tpl_vars['title']; ?>
</title>
<link href="http://wap.srb.rs/teme/<?php echo $this->_tpl_vars['sitedata']['css']; ?>
.css" rel="stylesheet" type="text/css" />
<?php if ($this->_config[0]['vars']['reload']): ?>
	<meta http-equiv="refresh" content="0"/>
<?php endif; ?>
</head>
<body>
<table><tr><?php if ($this->_tpl_vars['sitedata']['put'] == "prva-old"): ?><td colspan="2"><?php else: ?><td><?php endif; ?>

<?php echo $this->_tpl_vars['slika']['srblogo']; ?>
<br/><?php echo $this->_tpl_vars['lang_display']['pozdrav']; ?>


<?php if ($this->_tpl_vars['userdata']['user_new_privmsg']): ?><a href="http://wap.srb.rs/forum/privmsg.php?folder=inbox<?php echo $this->_tpl_vars['atr']; ?>
">Nova Privatna Poruka</a><br/><?php endif; ?>
</td></tr>