<?php

// ------ phpbb integration
$phpbb_root_path = $pwd.'forumb/';

//check for phpbb location
define('IN_PHPBB', true);
define('IN_SITE', true);
//ko je tu - lokacija

			switch( $HTTP_GET_VARS['put'] )
			{
				case mms:
                    define('LOKACIJA_ID', -16);
					break;
				case download:
                    define('LOKACIJA_ID', -17);
					break;
				case novosti:
                    define('LOKACIJA_ID', -18);
					break;
				case druzenje:
                    define('LOKACIJA_ID', -19);
					break;
				case wp:
                    define('LOKACIJA_ID', -20);
					break;
				case link:
                    define('LOKACIJA_ID', -21);
					break;
				case kontakt:
                    define('LOKACIJA_ID', -22);
					break;
				default:
                    define('LOKACIJA_ID', -15);
			}

if (!file_exists($phpbb_root_path . 'extension.inc')) die('File Structure Error! Check $phpbb_root_path');

//include the required phpBB related files
include_once ($phpbb_root_path . 'extension.inc');
include_once ($phpbb_root_path . 'common.' . $phpEx);

//start session management
    $put = $HTTP_GET_VARS['put'];

if ( isset($put) && $put!= prva && $put!= pput) $lput='_'.$put;
 //$lput = "LOKACIJA_ID".$lput;
// echo LOKACIJA_ID;
$userdata = session_pagestart($user_ip, LOKACIJA_ID);
init_userprefs($userdata);

// ------ end of phpbb integration

?>
