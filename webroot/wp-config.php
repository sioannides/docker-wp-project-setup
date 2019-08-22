<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

require_once dirname(__DIR__) . '/vendor/autoload.php';
try { (new \josegonzalez\Dotenv\Loader(dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env'))->parse()->expect('DB_NAME')->toEnv(true)->putenv(true); } catch (\Exception $e) { echo $e->getMessage(); exit(1); }

$wp_url = getenv('WP_URL');
$name = getenv('DB_NAME');
$host = getenv('DB_HOST') ?: 'localhost';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: '';
$wp_table_prefix = getenv('WP_TABLE_PREFIX') ?: 'wp_';
$debug = getenv('WP_DEBUG') ?: false;
$debug_log = getenv('WP_DEBUG_LOG') ?: false;
$debug_display = getenv('WP_DEBUG_DISPLAY') ?: false;
$post_revisions = getenv('WP_POST_REVISIONS') ?: false;
$force_ssl_admin = getenv('FORCE_SSL_ADMIN') ?: 0;
$force_ssl_login = getenv('FORCE_SSL_LOGIN') ?: 0;
$disallow_file_edit = getenv('DISALLOW_FILE_EDIT') ?: true;
$disallow_file_mods = getenv('DISALLOW_FILE_MODS') ?: true;
$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
$wp_content_dir = getenv('WP_CONTENT_DIR') ?: 'wp-content';
$wp_plugin_dir = getenv('WP_PLUGIN_DIR') ?: 'plugins';

define('FORCE_SSL_ADMIN', $force_ssl_admin);
define('FORCE_SSL_LOGIN', $force_ssl_login);
define('WP_HOME', $wp_url);
define('WP_SITEURL', $wp_url);
define('WP_MEMORY_LIMIT', '64M');
define ("WPML_LOAD_API_SUPPORT",1);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'secret');

/** MySQL hostname */
define('DB_HOST', 'db:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Post revisions */
define('WP_POST_REVISIONS', $post_revisions);

/** Deactivate Theme and Plugin Editors */
define('DISALLOW_FILE_EDIT', $disallow_file_edit);

/** Deactivate updating and installing plugins and themes */
define('DISALLOW_FILE_MODS', $disallow_file_mods);

/** Define wp-content directory */
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . DIRECTORY_SEPARATOR . $wp_content_dir  );
define( 'WP_CONTENT_URL', '//' . $_SERVER['HTTP_HOST'] . '/' . $wp_content_dir );


/** Define plugins directory */
define( 'WP_PLUGIN_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR . $wp_content_dir . DIRECTORY_SEPARATOR .  $wp_plugin_dir );
define( 'WP_PLUGIN_URL', '//' . $_SERVER['HTTP_HOST'] .'/'. $wp_content_dir .'/' . $wp_plugin_dir );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'wvmOA}LU`hG.}pJ!1w[YA)]A`by!XfdCL_Gjh4y-vLjksTjm99q=$1x7p[9f5L{(');
define('SECURE_AUTH_KEY',  '@ZqDjq?kW C#bf{wdv=l_2yED~T3TucokzUP9dZ-oX1f<2cXNTl*_G1R&qm~+<<-');
define('LOGGED_IN_KEY',    '#ot }aTlA$ZFkXN{Wx>I6&sGxL3_.=98E{,4HZ7K$=3V^uC<)!)`*i24+B_K@Z&n');
define('NONCE_KEY',        'pIcO2]ZRQ1?amLh3_8|L)DHy R_tEZ9V:f9U+9kP|*kuC{os)L.HOz~v/u[(b](`');
define('AUTH_SALT',        'L~}14!*#LNdQ>Ub)S;rjdBEFsw0}#G|5]vNRv* ;9Iwoh,*;w/<!Ai=^8zsC;e{?');
define('SECURE_AUTH_SALT', '[Sd#^0ko-)AR@9[:r._BO5Oh!>67KcP`rJ0CNoK2o^sDNx:y@,wDRO+!P`5{](UR');
define('LOGGED_IN_SALT',   '[PW&bG#K2%49Cng0V,JHH^V-,>>quQ%Un0FeF@gA7&OZ}J}<luA?VBp!)2.>k)#(');
define('NONCE_SALT',       '.?z[k$um1A}$^V5J_(XKAa~x3}/U/z+n)l7gQv.7DJ=CpWfx&&R?2R<s hr2-zNw');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = $wp_table_prefix;

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', $debug);
define('WP_DEBUG_LOG', $debug_log);
define('WP_DEBUG_DISPLAY', $debug_display);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
