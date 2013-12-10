<?php
$qu = @mysql_query("select `vopros`,`answered`,`time` from `".$px.$vtable."` where login='Вопрос' order by id desc;");
$quser = @mysql_query("select `vposts` from `".$px.$utable."` where login='Вопрос'");
$vuser = @mysql_fetch_array($quser);
$vposts = $login['vposts'];
$posts = $vuser['posts'];
$vict = @mysql_fetch_array($qu);
$que = @mysql_query("select * from `".$px.$qtable."`;");
$num_ques = @mysql_num_rows($que);
$rand1 = $vict['vopros'];
if(empty($rand1)) $rand1 = rand(1,$num_ques);
$rand_q = @mysql_query("select * from `".$px.$qtable."` where id='$rand1';");
$ques = @mysql_fetch_array($rand_q);
$nv = $ques['vopros'];
$answer = strtolower($ques['otvet']);
$msg = strtolower($msg);
$answered = $vict['answered'];
$vopros = $vict['vopros'];
$time = $vict['time'];
$now = time();
if($vopros) {
if(($now < $time + 120)&&(empty($answered))) {
	if(preg_match("/$answer/i","$msg")) {
	@mysql_query("update `".$px.$utable."` set posts=".($posts+1)." where login='Вопрос'");
	@mysql_query("update `".$px.$utable."` set vposts=".($vposts+1)." where login='".$login['login']."'"); 
	@mysql_query("insert into `".$px.$vtable."` values (0,'Вопрос','Молодец, ".$login['login']."! Ответ верный! Правильных ответов: ".($vposts+1)."!','','','','','".time()."');");
	@mysql_query("update `".$px.$vtable."` set answered='1' where vopros='$rand1' and login='Вопрос'");
	}
	} else {
		if(empty($answered)&&(!empty($vopros)))
	@mysql_query("insert into `".$px.$vtable."` values (0,'Вопрос','Время истекло, следующий вопрос через минуту!','$pr_from','$pr_to','0','0','".time()."');");
	@mysql_query("update `".$px.$utable."` set posts=".($posts+1)." where login='Вопрос'");
	}
	} else {
	$len = strlen($answer)/2;
	@mysql_query("insert into `".$px.$vtable."` values (0,'Вопрос','$nv ($len букв)','','','$rand1','0','".time()."');");
	@mysql_query("update `".$px.$utable."` set posts=".($posts+1)." where login='Вопрос'");
	}
?>