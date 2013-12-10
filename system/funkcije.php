<?

function slika($link='',$alt,$myDevice)
{ global $profildata;
    $link="pic/".$profildata['ikonice']."/".$link;
    if ( $myDevice->getDeviceCapability("gif")) $ext=".gif";
    else $ext=".wbmp";
    $link="<img src=\"$link$ext\" alt=\"$alt\" />";
$potpis .= " >> /home/milan/www/wap-new/IM.log";
return $link;
}

function slika2($link='',$alt,$lsr,$myDevice)
{
    $link="pic/.male/".$link;
    if ( $myDevice->getDeviceCapability("opwv_wml_extensions_support")) $link="<img localsrc=\"$lsr\" src=\"\" alt=\"$alt\" />";
    else $link="<img src=\"$link.png\" alt=\"$alt\" />";
return $link;
}

function ko ()
{
    $ko = substr($_SERVER['HTTP_USER_AGENT'],0,15);
return $ko;
}

function wurflcheck($opcija,$myDevice)
{ global $sacuvano;
    if (!isset ($sacuvano[$opcija])){
        $sacuvano[$opcija] = $myDevice->getDeviceCapability(''.$opcija.'');
    }
return $sacuvano;
}




   // pozivati na vrhu svake strane sa: ok("100"); -gost ili ok("10"); -clan ili ok("0"); -admin
   // bitno je da bude poslje session_start(); funkcije

     function ok($nivo,$userdata){
        if ($userdata['username'] == 'Anonymous') $level = 10;
        else {
        $sql = "SELECT user_level FROM `phpbb_users` where user_id =".$userdata['user_id'];
		$result = mysql_query($sql);
		$level = mysql_result($result, 0, "user_level");
		if ($level==0) $level = 5;
		}
		if ( $level < $nivo || $level == $nivo) {

			return true;
		} else {
			return false;
		}
   }

function profil($profildata) {
    global $userdata,$myDevice; $datum = date("Y-m-d H:i:s") ;
    if ($myDevice->getDeviceCapability("html_wi_w3_xhtmlbasic")) $ntmplate = "xhtml"; else $ntmplate = "wml";
        $sql = "SELECT loginid FROM `profil` where loginid =".$userdata['user_id'];
		$result = mysql_query($sql);
		if ($result) $level = @mysql_result($result, 0, "loginid");



    if ($profildata['status']=="login" && $userdata['user_id'] != "-1"){
      if ($level!=$userdata['user_id'] || !isset($level)) $aSql="insert into profil ( id, loginid, tmp, tmp1, tmp2, tema, ikonice, `lastlogin`) values ( 'NULL','".$userdata['user_id']."','".$profildata['put']."','$jezik','$k','$ntmplate','standard','standardne', NOW() );";
          else $aSql="UPDATE profil SET tmp = '".$profildata['put']."', lastlogin = NOW() WHERE loginid =".$userdata['user_id'];
          }
    elseif ($profildata['status']=="update" && $userdata['user_id'] != "-1") {$aSql="UPDATE profil SET tmplate = '".$profildata['tmplate']."',tema = '".$profildata['tema']."', ikonice = '".$profildata['ikonice']."', tmp = '".$profildata['tmp']."',tmp1 = '".$profildata['tmp1']."', tmp2 = '".$profildata['tmp2']."', lastlogin = NOW() WHERE loginid =".$userdata['user_id'];
       // echo "LEVEL:$level:".$profildata['status'].":".$userdata['user_id'];
       }

//echo $aSql;
                $aQResult = mysql_query($aSql);

        if ( $aQResult == True ) return true;
        else  return false;
}
    
function profildata($table, $where){
	global $db, $userdata;
	$sql = "SELECT * FROM $table WHERE  $where";
	if ( !($result = $db->sql_query($sql)) )
	{
		message_die(CRITICAL_ERROR, 'Could not obtain profil data from '.$table.' table', '', __LINE__, __FILE__, $sql);
	}

    $profildata = $db->sql_fetchrow($result);

  return ($profildata);
}



function phbblogin()
{
 // if ($pwd == ".") $pwd="";
  global $doz, $userdata, $index, $put, $atr;
    if (!ok($doz,$userdata))
    {
    	if ( !$userdata['session_logged_in'] )
    	{
          if ($put == "chat" || $put == "forum") $dirr=$put."/";
        header("Location: ".$index.PWD."forum/login.php?redirect=../$dirr?put=$put&".SID);
        exit;
    	}
    $put="zp";
    }
    else {
      if ($put == "chat" || $put == "forum") header("Location: ".$index."$put/?".SID);
    }
return $put;
}

?>
