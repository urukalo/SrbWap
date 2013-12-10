<?php
define("DATADIR", $wurfldir);

require_once($wurfldir.'wurfl_config.php');
require_once(WURFL_CLASS_FILE);
$myDevice = new wurfl_class();

if ($k==1) {
if (isset($ua) && $ua != "") $myDevice->GetDeviceCapabilitiesFromAgent(''.$ua.'');
//else $myDevice->GetDeviceCapabilitiesFromAgent('SIE-M55/10 UP.Browser/6.1.0.5.c.6 (GUI) MMP/1.0');
else 	$myDevice->GetDeviceCapabilitiesFromAgent('Nokia6600/1.0');

//$myDevice->GetDeviceCapabilitiesFromAgent('Nokia6600/1.0 (5.27.0) SymbianOS/7.0s Series60/2.0 Profile/MIDP-2.0 Configuration/CLDC-1.0');
}
else $myDevice->GetDeviceCapabilitiesFromAgent($_SERVER['HTTP_USER_AGENT']);


//$myDevice->GetDeviceCapabilitiesFromAgent($_SERVER['HTTP_USER_AGENT']);

?>
