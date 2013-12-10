<?php /* Smarty version 2.6.10, created on 2009-12-04 13:32:23
         compiled from wml/header.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">
<wml>
<head>
<meta http-equiv="Cache-Control" content="no-cache"/>
</head>
<card id="<?php echo $this->_tpl_vars['title']; ?>
" title="<?php echo $this->_tpl_vars['title']; ?>
">
<p align="center">
<?php echo $this->_tpl_vars['slika']['srblogo']; ?>
<br/><?php echo $this->_tpl_vars['lang_display']['pozdrav']; ?>

<?php if ($this->_tpl_vars['userdata']['user_new_privmsg']): ?><a href="http://wap.srb.rs/forum/privmsg.php?folder=inbox<?php echo $this->_tpl_vars['atr']; ?>
">Nova Privatna Poruka</a><br/><?php endif; ?>