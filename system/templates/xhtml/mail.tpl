<tr><td>
{if $sitedata.mail eq "nov"}
Posalji email sa atacmentom.<br/>
<form action="?put=mail" method="get">
  Fajl: {$smarty.get.sta2}<br/>
  Email:
<input type="text" name="za" value="@063.mobtel.com"/><br/>

  <input type='hidden' name="put" value='mail'/>
  <input type='hidden' name="sta1" value='{$smarty.get.sta1}'/>
  <input type='hidden' name="sta2" value='{$smarty.get.sta2}'/>
  <input type='hidden' name="sid" value='{$userdata.session_id}'/>
  <input type='submit' name="Submit" value='Posalji'/>
</form>
{else}
{$sitedata.mail}
{/if}
</td></tr>
