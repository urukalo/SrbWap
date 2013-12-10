<tr><td>
{if $sitedata.mail eq "nov"}

Posalji email sa atacmentom.<br/>
<do type="options" label="posalji">
<go method="get" href="?put=mail{$atr}">
	<postfield name="Submit" value="1"/>
	<postfield name="put" value='mail'/>
	<postfield name="sta1" value='{$smarty.get.sta1}'/>
	<postfield name="sta2" value='{$smarty.get.sta2}'/>
	<postfield name="sid" value='{$userdata.session_id}'/>
</go></do>
  Fajl: {$smarty.get.sta2}<br/>
  Email:
<input type="text" name="za" value="@063.mobtel.com"/><br/>


<a href="?put=mail{$atr}&amp;sta1={$smarty.get.sta1}&amp;sta2={$smarty.get.sta2}&amp;za=$(za)&amp;Submit=1">Posalji</a>

{else}
{$sitedata.mail}
{/if}
</td></tr>
