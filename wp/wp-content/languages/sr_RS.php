<?php
/*
* Replace default secret key with localized one
*/
$wp_default_secret_key = 'stavite vas jedinstven izraz ovde';




/*
* Script for transliteration of Serbian Cyrillic characters in URL slugs to English Latin characters
*/

/*
* Get value of option
*/
if( function_exists('get_option') ) {
	$ser_cyr_to_lat_slug = get_option('ser_cyr_to_lat_slug');
}

/*
* If option is not made, make it and default value is true
*/
if (!$ser_cyr_to_lat_slug) {
	add_option('ser_cyr_to_lat_slug', 1);
}

/*
* Function to add field on Permalink Settings page
* Based on http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
*/
function add_ser_cyr_to_lat_slug_settings_field() {
	
	/*
	* The fields are:
	* the id the form field will use
	* name to display on the page
	* callback function
	* the name of the page
	* the section of the page to add the field to
	*/
	add_settings_field('ser_cyr_to_lat_slug' , 'Пресловљавање подлошка' ,
			'ser_cyr_to_lat_slug_field_callback' , 'general' , 'default');
 
	//register the setting to make sure it gets checked
	register_setting('general','ser_cyr_to_lat_slug', 'ser_cyr_to_lat_slug_validate');
}

/*
* Function for printing fields on Permalink Settings page
* Based on http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
*/
function ser_cyr_to_lat_slug_field_callback() {
	global $ser_cyr_to_lat_slug;
	//print checkox ?>
	<label for="ser_cyr_to_lat_slug"><input id="ser_cyr_to_lat_slug" name="ser_cyr_to_lat_slug" type="checkbox" value="1" 
	<?php checked('1', $ser_cyr_to_lat_slug); ?>
	/> Преслови српска ћирилична у енглеска латинична слова у пермалинковима</label><br />
	<span class="description">Уколико желите да се у пермалинковима уместо српских ћириличних слова појављују енглеска латинична, овај квадратић треба да буде штиклиран</span>
 
<?php }

/*
* Sanitize and validate input.
* Based on http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
*/
function ser_cyr_to_lat_slug_validate($input) {
	// Our first value is either 0 or 1
	$input = ( $input == 1 ? 1 : 0 );
	return $input;
}

/*
* Add action so that functions could actually work
*/
add_action('admin_init', 'add_ser_cyr_to_lat_slug_settings_field');

/*
* Check if option is used
* If so, transliterate letters in permalink
*/
if ($ser_cyr_to_lat_slug == 1) {
	//function based on plugin Cyr-To-Lat ( http://wordpress.org/extend/plugins/cyr2lat/ )
	function sanitize_term_translate ($title) {
		$cyr2lat_table = array(
		"А"=>"a","Б"=>"b","В"=>"v","Г"=>"g","Д"=>"d",
		"Ђ"=>"dj","Е"=>"e","Ж"=>"z","З"=>"z","И"=>"i",
		"Ј"=>"j","К"=>"k","Л"=>"l","Љ"=>"lj","М"=>"m",
		"Н"=>"n","Њ"=>"nj","О"=>"o","П"=>"p","Р"=>"r",
		"С"=>"s","Т"=>"t","Ћ"=>"c","У"=>"u","Ф"=>"f",
		"Х"=>"h","Ц"=>"c","Ч"=>"c","Џ"=>"dz","Ш"=>"s",
		"а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
		"ђ"=>"dj","е"=>"e","ж"=>"z","з"=>"z","и"=>"i",
		"ј"=>"j","к"=>"k","л"=>"l","љ"=>"lj","м"=>"m",
		"н"=>"n","њ"=>"nj","о"=>"o","п"=>"p","р"=>"r",
		"с"=>"s","т"=>"t","ћ"=>"c","у"=>"u","ф"=>"f",
		"х"=>"h","ц"=>"c","ч"=>"c","џ"=>"dz","ш"=>"s",
		"„"=>" ","“"=>" ","”"=>" ","‘"=>" ","’"=>" ","→"=>"-","—"=>"-"
		);
	
		global $wpdb;
		if ($term = $wpdb->get_var("SELECT slug FROM $wpdb->terms WHERE name='$title'")) 
			return $term; 
			else return strtr($title,$cyr2lat_table);
	}

	if (count($_POST) ) {
		add_action('sanitize_title', 'sanitize_term_translate', 0);
	}
}

?>