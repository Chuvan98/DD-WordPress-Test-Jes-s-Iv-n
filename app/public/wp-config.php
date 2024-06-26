<?php
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
define( 'AUTH_KEY',          ' b}P>)[i4t`jPq7$$549LcAmADThcY#Z^WixF]W3`o?(S65MMOVG_Xwx(5/sB3f5' );
define( 'SECURE_AUTH_KEY',   'nn(ic3a4?%5}/><@D&|}w.1Xa%Dh|2AY,/_]JG.V+3Dg1; 0C3o4oE4$2kyM?|%S' );
define( 'LOGGED_IN_KEY',     '.R|8`n%BJYZR)cH,QG0=jb4xDi!OH(Tze }/$Z|faWJs%fRf?4YMXWI>`fQi9(U}' );
define( 'NONCE_KEY',         'YwW($e0(w-<N&>H)EADo2DFy#cj1nAh!~;)@wf]YY|ZES`W5nH4S?NoDzQFO9!_i' );
define( 'AUTH_SALT',         '|8nRBvsgYBL&YaYsb_v>tC9C0Rent6<YCBh$%|r:Ex3ydSi8+)A~^Fub-PE5OAJs' );
define( 'SECURE_AUTH_SALT',  'wyyqOeArJs.:/1h6V)(i|0-#I|{NazH~BSp30R3<h.r0woE`J84m/lsLRCe%HRBO' );
define( 'LOGGED_IN_SALT',    'hB|`JZV)P KQg}/gN/QUce~2Lsk}&z3G~zA3OWM(Nj*Vv#|1DOGz3ty)dmfHM}r6' );
define( 'NONCE_SALT',        'i8?GT:)i|EQ| P[!-J?!hj5TdV:cqf(5yv<PmBidF~^Qu{oUK]3=Ne3b7zWC37 8' );
define( 'WP_CACHE_KEY_SALT', 'no(d3nsRSpIt>S(!A^vFS>y0C67O%R*HyZP4IxJy<@)XT>_j3T(e}r$1}P!qVh%O' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );

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
