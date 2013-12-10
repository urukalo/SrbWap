<tr><td>
<form name="send" action="http://sms.mts-udm.ru/cgi-bin/cgi.exe?function=sms_send" method="post">

					
	<input name="MMObjectType" value="0" type="hidden">
	<input name="isFree" value="1" type="hidden">
	<input name="MMObjectID" value="" type="hidden">
	<input name="Layer" value="" type="hidden">
{$sitedata.smsimage}
	<input name="To" value="3816" type="text">
	<br/>
	<textarea name="Msg" cols="32" rows="5"></textarea><br/>
	<input value="Posalji" type="submit">
</form>
</td></tr>
