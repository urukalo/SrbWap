<?php
/**
 * Retrieves and creates the wp-config.php file.
 *
 * The permissions for the base directory must allow for writing files in order
 * for the wp-config.php to be created using this page.
 *
 * @package WordPress
 * @subpackage Administration
 */

/**
 * We are installing.
 *
 * @package WordPress
 */
define('WP_INSTALLING', true);

/**
 * Disable error reporting
 *
 * Set this to error_reporting( E_ALL ) or error_reporting( E_ALL | E_STRICT ) f
or debugging
 */
error_reporting(0);

/**#@+
 * These three defines are required to allow us to use require_wp_db() to load
 * the database class while being wp-content/db.php aware.
 * @ignore
 */
define('ABSPATH', dirname(dirname(__FILE__)).'/');
define('WPINC', 'wp-includes');
define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
/**#@-*/

require_once(ABSPATH . WPINC . '/compat.php');
require_once(ABSPATH . WPINC . '/functions.php');
require_once(ABSPATH . WPINC . '/classes.php');

if (!file_exists(ABSPATH . 'wp-config-sample.php'))
	wp_die('Жао нам је, потребна нам је датотека wp-config-sample.php да бисмо радили. Молимо вас да је поново отпремите из своје Вордпресове инсталације.');


$configFile = file(ABSPATH . 'wp-config-sample.php');




// Check if wp-config.php has been created
if (file_exists(ABSPATH . 'wp-config.php'))
	wp_die("<p>Датотека 'wp-config.php' већ постоји. Уколико желите да вратите на почетно стање било коју конфигурациону ставку у овој датотеци, молимо вас да је прво избришете. Можете пробати инсталацију <a href='install.php'>сада</a>.</p>");


// Check if wp-config.php exists above the root directory but is not part of another install
if (file_exists(ABSPATH . '../wp-config.php') && ! file_exists(ABSPATH . '../wp-settings.php'))
	wp_die("<p>Датотека 'wp-config.php' већ постоји један ниво изнад ваше инсталације Вордпреса. Уколико желите да вратите на почетно стање било коју конфигурациону ставку у овој датотеци, молимо вас да је прво избришете. Можете покушати са <a href='install.php'>инсталирањем</a> сада.</p>");

if ( version_compare( '4.3', phpversion(), '>' ) )
	wp_die( sprintf( /*WP_I18N_OLD_PHP*/'Ваш сервер користи издање PHP-а %s али Вордпрес захтева најмање 4.3.'/*/WP_I18N_OLD_PHP*/, phpversion() ) );

if ( !extension_loaded('mysql') && !file_exists(ABSPATH . 'wp-content/db.php') )
	wp_die( /*WP_I18N_OLD_MYSQL*/'Вашој PHP инсталацији изгледа да фали MySQL проширење које је неопходно за Вордпрес.'/*/WP_I18N_OLD_MYSQL*/ );


if (isset($_GET['step']))
	$step = $_GET['step'];
else
	$step = 0;

/**
 * Display setup wp-config.php file header.
 *
 * @ignore
 * @since 2.3.0
 * @package WordPress
 * @subpackage Installer_WP_Config
 */
function display_header() {
	header( 'Content-Type: text/html; charset=utf-8' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Вордпрес &rsaquo; Подешавање конфигурационе датотеке</title>
<link rel="stylesheet" href="css/install.css" type="text/css" />

</head>
<body>
<h1 id="logo"><img alt="WordPress" src="images/wordpress-logo.png" /></h1>
<?php
}//end function display_header();

switch($step) {
	case 0:
		display_header();
?>

<p>Добро дошли у Вордпрес. Пре него што почнемо, потребни су нам неки подаци о бази података. Мораћете да знате следеће ставке пре наставка.</p>

<ol>
	<li>Име базе</li>
	<li>Корисничко име базе</li>
	<li>Лозинку базе</li>
	<li>Домаћина (сервер) базе</li>
	<li>Префикс табеле (уколико желите да покрећете више од једног Вордпреса из једне базе) </li>





</ol>
<p><strong>Уколико из било ког разлога ово аутоматско прављење датотеке не буде радило, не брините. Све што ово ради је да попуњава податке о бази у конфигурациону датотеку. Можете такође једноставно да отворите <code>wp-config-sample.php</code> у уређивачу текста, попуните своје податке и сачувате је као <code>wp-config.php</code>. </strong></p>
<p>У свакој могућности, ове ставке су вам достављене од стране вашег провајдера. Уколико немате ове податке, онда морате да их контактирате пре него што наставите. Уколико сте спремни&hellip;</p>



<p class="step"><a href="setup-config.php?step=1" class="button">кренимо!</a></p>
<?php
	break;

	case 1:
		display_header();
	?>
<form method="post" action="setup-config.php?step=2">
	<p>Испод би требало да унесете податке за повезивање са вашом базом. Уколико нисте сигурни о овоме, контактирајте домаћина вашег сервера. </p>

	<table class="form-table">
		<tr>
			<th scope="row"><label for="dbname">Име базе</label></th>
			<td><input name="dbname" id="dbname" type="text" size="25" value="wordpress" /></td>
			<td>Име базе у којој желите да снимате Вордпресове податке. </td>

		</tr>
		<tr>
			<th scope="row"><label for="uname">Корисничко име базе</label></th>
			<td><input name="uname" id="uname" type="text" size="25" value="username" /></td>
			<td>Ваше MySQL корисничко име</td>
		</tr>
		<tr>
			<th scope="row"><label for="pwd">Лозинка</label></th>
			<td><input name="pwd" id="pwd" type="text" size="25" value="password" /></td>
			<td>...и MySQL лозинка.</td>

		</tr>
		<tr>
			<th scope="row"><label for="dbhost">Домаћин (сервер) базе</label></th>
			<td><input name="dbhost" id="dbhost" type="text" size="25" value="localhost" /></td>
			<td>99% вероватноће да ово нећете морати да мењате.</td>

		</tr>
		<tr>
			<th scope="row"><label for="prefix">Префикс табеле</label></th>
			<td><input name="prefix" id="prefix" type="text" id="prefix" value="wp_" size="25" /></td>
			<td>Уколико желите да покрећете више од једног Вордпреса из једне базе, промените ово.</td>

		</tr>
	</table>
	<p class="step"><input name="submit" type="submit" value="Пошаљи" class="button" /></p>
</form>
<?php
	break;

	case 2:
	$dbname  = trim($_POST['dbname']);
	$uname   = trim($_POST['uname']);
	$passwrd = trim($_POST['pwd']);
	$dbhost  = trim($_POST['dbhost']);
	$prefix  = trim($_POST['prefix']);
	if (empty($prefix)) $prefix = 'wp_';

	// Test the db connection.
	/**#@+
	 * @ignore
	 */
	define('DB_NAME', $dbname);
	define('DB_USER', $uname);
	define('DB_PASSWORD', $passwrd);
	define('DB_HOST', $dbhost);
	/**#@-*/

	// We'll fail here if the values are no good.
	require_wp_db();
	if ( !empty($wpdb->error) )
		wp_die($wpdb->error->get_error_message());



	foreach ($configFile as $line_num => $line) {
		switch (substr($line,0,16)) {
			case "define('DB_NAME'":
				$configFile[$line_num] = str_replace("staviteimebazeovde", $dbname, $line);
				break;
			case "define('DB_USER'":
				$configFile[$line_num] = str_replace("'korisnickoimeovde'", "'$uname'", $line);
				break;
			case "define('DB_PASSW":
				$configFile[$line_num] = str_replace("'vasalozinkaovde'", "'$passwrd'", $line);
				break;
			case "define('DB_HOST'":
				$configFile[$line_num] = str_replace("localhost", $dbhost, $line);
				break;
			case '$table_prefix  =':
				$configFile[$line_num] = str_replace('wp_', $prefix, $line);
				break;


		}
	}
	if ( ! is_writable(ABSPATH) ) :
		display_header();
?>
<p>Жао нам је, али није могуће уписати датотеку <code>wp-config.php</code>.</p>
<p>Можете ручно направити датотеку <code>wp-config.php</code> и налепити следећи текст у њу.</p>
<textarea cols="90" rows="15"><?php
		foreach( $configFile as $line ) {
			echo htmlentities($line);
		}
?></textarea>
<p>Када завршите са тим, притисните „Покрени инсталирање“.</p>
<p class="step"><a href="install.php" class="button">Покрени инсталирање</a></p>
<?php
	else :
		$handle = fopen(ABSPATH . 'wp-config.php', 'w');
		foreach( $configFile as $line ) {
			fwrite($handle, $line);
		}
		fclose($handle);
		chmod(ABSPATH . 'wp-config.php', 0666);

		display_header();
?>
<p>У реду, друже! Успео си кроз овај део инсталације. Вордпрес сада може да комуницира са твојом базом. Уколико си спреман, време је да&hellip;</p>


<p class="step"><a href="install.php" class="button">покренеш инсталирање</a></p>
<?php
	endif;
	break;
}
?>
</body>
</html>
