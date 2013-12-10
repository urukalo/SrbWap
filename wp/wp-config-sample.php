<?php
// ** MySQL подешавања ** //
define('DB_NAME', 'staviteimebazeovde');    // Име базе података
define('DB_USER', 'korisnickoimeovde');     // Ваше корисничко име MySQL базе
define('DB_PASSWORD', 'vasalozinkaovde'); // ...и лозинка
define('DB_HOST', 'localhost');    // Адреса MySQL базе; 99% вероватноће да нећете морати да промените ову вредност
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

// Промените сваки KEY (кључ) у различит јединствени израз. Нећете морати да га запамтите касније,
// те га тако направите дугачким и замршеним. Можете посетити http://api.wordpress.org/secret-key/1.1/
// да бисте добили израз направљен за вас, или једноставно направите нешто. Сва три израза би требало да буду различита.
// НАПОМЕНА: Мора бити на енглеској латиници!
define('AUTH_KEY', 'stavite vas jedinstven izraz ovde'); // Промените ово у јединстен израз.
define('SECURE_AUTH_KEY', 'stavite vas jedinstven izraz ovde'); // Промените ово у јединстен израз.
define('LOGGED_IN_KEY', 'stavite vas jedinstven izraz ovde'); // Промените ово у јединстен израз.
define('NONCE_KEY', 'stavite vas jedinstven izraz ovde'); // Промените ово у јединстен израз.

// Можете имати више инсталација у једној бази уколико свакој дате јединствени префикс
$table_prefix  = 'wp_';   // Само бројеви, слова и доње црте, молимо вас!

//Језичка подешавања Вордпреса
// Промените ово да бисте користили други језик а не срспки у Вордпресу. Одговарајућа MO датотека за
// изабрани језик мора бити у директоријуму wp-content/languages.
// На пример, поставите датотеку ru_RU.mo у wp-content/languages и поставите WPLANG у 'ru_RU'
// да бисте обезбедили подршку за руски језик.
//Ако желите да користите подразумевани језик (енглески) оставите ово празно.
define ('WPLANG', 'sr_RS');

/* То је све, престаните са изменама! Срећно блоговање. */

if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
?>
