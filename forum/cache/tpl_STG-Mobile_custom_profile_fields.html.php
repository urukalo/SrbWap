<?php if (!defined('IN_PHPBB')) exit; $_dropdown_count = (isset($this->_tpldata['dropdown'])) ? sizeof($this->_tpldata['dropdown']) : 0;if ($_dropdown_count) {for ($_dropdown_i = 0; $_dropdown_i < $_dropdown_count; ++$_dropdown_i){$_dropdown_val = &$this->_tpldata['dropdown'][$_dropdown_i]; ?>
	<select name="<?php echo $_dropdown_val['FIELD_IDENT']; ?>">
		<?php $_options_count = (isset($_dropdown_val['options'])) ? sizeof($_dropdown_val['options']) : 0;if ($_options_count) {for ($_options_i = 0; $_options_i < $_options_count; ++$_options_i){$_options_val = &$_dropdown_val['options'][$_options_i]; ?><option value="<?php echo $_options_val['OPTION_ID']; ?>"<?php echo $_options_val['SELECTED']; ?>><?php echo $_options_val['VALUE']; ?></option><?php }} ?>
	</select>
<?php }} $_text_count = (isset($this->_tpldata['text'])) ? sizeof($this->_tpldata['text']) : 0;if ($_text_count) {for ($_text_i = 0; $_text_i < $_text_count; ++$_text_i){$_text_val = &$this->_tpldata['text'][$_text_i]; ?>
	<textarea name="<?php echo $_text_val['FIELD_IDENT']; ?>" rows="<?php echo $_text_val['FIELD_ROWS']; ?>" cols="<?php echo $_text_val['FIELD_COLS']; ?>"><?php echo $_text_val['FIELD_VALUE']; ?></textarea>
<?php }} $_string_count = (isset($this->_tpldata['string'])) ? sizeof($this->_tpldata['string']) : 0;if ($_string_count) {for ($_string_i = 0; $_string_i < $_string_count; ++$_string_i){$_string_val = &$this->_tpldata['string'][$_string_i]; ?>
	<input type="text" class="post" name="<?php echo $_string_val['FIELD_IDENT']; ?>" size="<?php echo $_string_val['FIELD_LENGTH']; ?>" maxlength="<?php echo $_string_val['FIELD_MAXLEN']; ?>" value="<?php echo $_string_val['FIELD_VALUE']; ?>" />
<?php }} $_bool_count = (isset($this->_tpldata['bool'])) ? sizeof($this->_tpldata['bool']) : 0;if ($_bool_count) {for ($_bool_i = 0; $_bool_i < $_bool_count; ++$_bool_i){$_bool_val = &$this->_tpldata['bool'][$_bool_i]; if ($_bool_val['FIELD_LENGTH'] == (1)) {  $_options_count = (isset($_bool_val['options'])) ? sizeof($_bool_val['options']) : 0;if ($_options_count) {for ($_options_i = 0; $_options_i < $_options_count; ++$_options_i){$_options_val = &$_bool_val['options'][$_options_i]; ?><input type="radio" class="radio" name="<?php echo $_bool_val['FIELD_IDENT']; ?>" value="<?php echo $_options_val['OPTION_ID']; ?>"<?php echo $_options_val['CHECKED']; ?> /><span class="genmed"><?php echo $_options_val['VALUE']; ?></span>&nbsp; &nbsp;<?php }} } else { ?>
		<input type="checkbox" class="radio" name="<?php echo $_bool_val['FIELD_IDENT']; ?>" value="1"<?php if ($_bool_val['FIELD_VALUE'] == (1)) {  ?> checked="checked"<?php } ?> />
	<?php } }} $_int_count = (isset($this->_tpldata['int'])) ? sizeof($this->_tpldata['int']) : 0;if ($_int_count) {for ($_int_i = 0; $_int_i < $_int_count; ++$_int_i){$_int_val = &$this->_tpldata['int'][$_int_i]; ?>
	<input type="text" class="post" name="<?php echo $_int_val['FIELD_IDENT']; ?>" size="<?php echo $_int_val['FIELD_LENGTH']; ?>" value="<?php echo $_int_val['FIELD_VALUE']; ?>" />
<?php }} $_date_count = (isset($this->_tpldata['date'])) ? sizeof($this->_tpldata['date']) : 0;if ($_date_count) {for ($_date_i = 0; $_date_i < $_date_count; ++$_date_i){$_date_val = &$this->_tpldata['date'][$_date_i]; ?>
	<span class="genmed"><?php echo ((isset($this->_rootref['L_DAY'])) ? $this->_rootref['L_DAY'] : ((isset($user->lang['DAY'])) ? $user->lang['DAY'] : '{ DAY }')); ?>:</span> <select name="<?php echo $_date_val['FIELD_IDENT']; ?>_day"><?php echo $_date_val['S_DAY_OPTIONS']; ?></select>
	<span class="genmed"><?php echo ((isset($this->_rootref['L_MONTH'])) ? $this->_rootref['L_MONTH'] : ((isset($user->lang['MONTH'])) ? $user->lang['MONTH'] : '{ MONTH }')); ?>:</span> <select name="<?php echo $_date_val['FIELD_IDENT']; ?>_month"><?php echo $_date_val['S_MONTH_OPTIONS']; ?></select>
	<span class="genmed"><?php echo ((isset($this->_rootref['L_YEAR'])) ? $this->_rootref['L_YEAR'] : ((isset($user->lang['YEAR'])) ? $user->lang['YEAR'] : '{ YEAR }')); ?>:</span> <select name="<?php echo $_date_val['FIELD_IDENT']; ?>_year"><?php echo $_date_val['S_YEAR_OPTIONS']; ?></select>
<?php }} ?>