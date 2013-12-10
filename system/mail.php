<?
if (!isset($HTTP_GET_VARS['sta1']) && !isset($HTTP_GET_VARS['sta2'])) {$sitedata["mail"] .= "Greska!!! Na znam sta da posaljem"; return;}



if (isset($_GET['Submit'])) {

include ($includedir."mail-sent.php");
$sitedata["mail"] .= "<a href=\"?put=download&amp;dir=".$HTTP_GET_VARS['sta1']."$atr \">Povratak na ".$HTTP_GET_VARS['sta1']."</a>";

} else {
$sitedata["mail"] = "nov";
}
?>
