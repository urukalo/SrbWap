-{$lang_display.SRBWap} {$lang_display.Analizator} -<br/>
<img src="dpics/{$myDevice->capabilities.fall_back}.gif" alt="" /><br/>
Proizvodjac: {$myDevice->capabilities.product_info.brand_name}<br/>
Model: {$myDevice->capabilities.product_info.model_name}<br/>
Rezolocija: {$myDevice->capabilities.display.resolution_width}x{$myDevice->capabilities.display.resolution_height}<br/>
Broj boja: {$myDevice->capabilities.image_format.colors}<br/>
Podrska za socket konekcije: { if $myDevice->capabilities.j2me.j2me_socket}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Gif podrska: { if $myDevice->capabilities.image_format.gif }{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Jpg podrska: { if $myDevice->capabilities.image_format.jpg}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Png podrska: { if $myDevice->capabilities.image_format.png}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Wbmp podrska: { if $myDevice->capabilities.image_format.wbmp}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
bmp podrska: { if $myDevice->capabilities.image_format.bmp}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Wav podrska: { if $myDevice->capabilities.sound_format.wav}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Amr podrska: { if $myDevice->capabilities.sound_format.amr}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Midi polyphonic podrska: { if $myDevice->capabilities.sound_format.midi_polyphonic}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Mmf podrska: { if $myDevice->capabilities.sound_format.mmf}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Mp3 podrska: { if $myDevice->capabilities.sound_format.mp3}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Max download size: {$myDevice->capabilities.storage.max_object_size}<br/>
Video Podrska: { if $myDevice->capabilities.object_download.video}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Video RM8 Podrska: { if $myDevice->capabilities.object_download.video_real_media_8}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Video 3gpp Podrska: { if $myDevice->capabilities.object_download.video_3gpp}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Video mp4 Podrska: { if $myDevice->capabilities.object_download.video_mp4}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Video Wmv Podrska: { if $myDevice->capabilities.object_download.video_wmv}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
Video Mov Podrska: { if $myDevice->capabilities.object_download.video_mov}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}<br/>
xhtml-basic Podrska: {if $myDevice->capabilities.markup.html_wi_w3_xhtmlbasic}{$lang_display.Ima} {else} {$lang_display.Nema} {/if}
