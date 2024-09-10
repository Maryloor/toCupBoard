<?php
//Begin Really Simple SSL key
define('RSSSL_KEY', 'FZHgbyn8K37gDsdykO8kyY64YwEMd5OaFbBwzt8S4psvjOkMxoH102RiPd3xNHH2');
//END Really Simple SSL key

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );
/** Database username */
define( 'DB_USER', 'root' );
/** Database password */
define( 'DB_PASSWORD', 'root' );
/** Database hostname */
define( 'DB_HOST', 'localhost' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'wI5Y/K8.K#Fqag7Kj(G0p:p2:u_`tdlex;[1&x;~N2v2S)U^rgGmlEBAtv(pW5Qb' );
define( 'SECURE_AUTH_KEY',   'hzVfw8C!~bm>tZ$m+)J~Vc~YdJnC>.HCpMU[O7E_3t^/[d.F]%g^LG&R=C/JQM[:' );
define( 'LOGGED_IN_KEY',     'Xl{vFaB.xlGW+r!^1=y ^G9Rs-ety|8KM4ch*x/3ej|d/]TK@=)<B51H_o?eLyK5' );
define( 'NONCE_KEY',         'v6|YeO_q7BL6:M#H`qfcM=)U-~L5x|lHwoV9fA=V8mRV#SlStUm=5SI(/{zwszPw' );
define( 'AUTH_SALT',         'O0.pR557]b6yx1<y]mEGx7-@9xXo^IbY11;W}FB}`6d2sF8k/BhBT[so{7:?F_G+' );
define( 'SECURE_AUTH_SALT',  'Ke;4$@WQ(3/thyyy:F64<,`=?,6^wd)6}Fp->3<rWr7JdHx$ 7;Uuu$BWUD++W}^' );
define( 'LOGGED_IN_SALT',    'Wsiww2u(mhp$WOm38rdlr?gqnNt<_;0!vfT^u3CXfy*FNzPb?8_kK)-C+-tN:}*p' );
define( 'NONCE_SALT',        'A7#@.Y*2|=M3VRN#AZIC,kA?3+ZPij}i`-@]`_bJn7K+2jgZs13-C==7ngpAMBoI' );
define( 'WP_CACHE_KEY_SALT', 'VNHS0U@Q&EMcybka~)d{ny{yTsTU}So|)s:{*3rvD?nUHZ[h_;p1bE;a#[PrZ$Ip' );
/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
/* Add any custom values between this line and the "stop editing" line. */
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
