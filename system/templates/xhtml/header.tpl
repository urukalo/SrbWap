<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN"
    "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
<title>{$title}</title>
<link href="http://wap.srb.rs/teme/{$sitedata.css}.css" rel="stylesheet" type="text/css" />
{if #reload#}
	<meta http-equiv="refresh" content="0"/>
{/if}
</head>
<body>
<table><tr>{if $sitedata.put == "prva-old"}<td colspan="2">{else}<td>{/if}

{$slika.srblogo}<br/>{$lang_display.pozdrav}

{if $userdata.user_new_privmsg}<a href="http://wap.srb.rs/forum/privmsg.php?folder=inbox{$atr}">Nova Privatna Poruka</a><br/>{/if}
</td></tr>
