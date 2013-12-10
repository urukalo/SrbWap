<?php /* Smarty version 2.6.10, created on 2007-02-07 17:24:07
         compiled from wml/analize.tpl */ ?>
-<?php echo $this->_tpl_vars['lang_display']['SRBWap']; ?>
 <?php echo $this->_tpl_vars['lang_display']['Analizator']; ?>
 -<br/>
<img src="dpics/<?php echo $this->_tpl_vars['myDevice']->capabilities['fall_back']; ?>
.gif" alt="" /><br/>
Proizvodjac: <?php echo $this->_tpl_vars['myDevice']->capabilities['product_info']['brand_name']; ?>
<br/>
Model: <?php echo $this->_tpl_vars['myDevice']->capabilities['product_info']['model_name']; ?>
<br/>
Rezolocija: <?php echo $this->_tpl_vars['myDevice']->capabilities['display']['resolution_width']; ?>
x<?php echo $this->_tpl_vars['myDevice']->capabilities['display']['resolution_height']; ?>
<br/>
Broj boja: <?php echo $this->_tpl_vars['myDevice']->capabilities['image_format']['colors']; ?>
<br/>
Podrska za socket konekcije: <?php if ($this->_tpl_vars['myDevice']->capabilities['j2me']['j2me_socket']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Gif podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['image_format']['gif']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Jpg podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['image_format']['jpg']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Png podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['image_format']['png']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Wbmp podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['image_format']['wbmp']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
bmp podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['image_format']['bmp']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Wav podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['sound_format']['wav']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Amr podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['sound_format']['amr']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Midi polyphonic podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['sound_format']['midi_polyphonic']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Mmf podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['sound_format']['mmf']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Mp3 podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['sound_format']['mp3']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Max download size: <?php echo $this->_tpl_vars['myDevice']->capabilities['storage']['max_object_size']; ?>
<br/>
Video Podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['object_download']['video']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Video RM8 Podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['object_download']['video_real_media_8']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Video 3gpp Podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['object_download']['video_3gpp']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Video mp4 Podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['object_download']['video_mp4']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Video Wmv Podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['object_download']['video_wmv']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
Video Mov Podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['object_download']['video_mov']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?><br/>
xhtml-basic Podrska: <?php if ($this->_tpl_vars['myDevice']->capabilities['markup']['html_wi_w3_xhtmlbasic']):  echo $this->_tpl_vars['lang_display']['Ima']; ?>
 <?php else: ?> <?php echo $this->_tpl_vars['lang_display']['Nema']; ?>
 <?php endif; ?>