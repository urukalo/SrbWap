<tr>{if $sitedata.put == "prva-old"}<td colspan="2">{else}<td>{/if}
------<br/>
<a href="http://wap.srb.co.yu/?put=prva{$atr}" title="{$lang_display.Prva}">-={$lang_display.Prva}=-</a>
<br/><a href="?put=analize{$atr}" title="{$lang_display.info}">{$myDevice->brand} {$myDevice->model}</a><br/>
{$sitedata.brojac}<br/>
<small>{$lang_display.komentar}</small>
</td></tr></table></body></html>
