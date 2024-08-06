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

 * * ABSPATH

 *

 * @link https://wordpress.org/documentation/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** Database settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', 'bitnami_wordpress' );


/** Database username */

define( 'DB_USER', 'bn_wordpress' );


/** Database password */

define( 'DB_PASSWORD', 'cf000a3054c948de076582832aa553acdd60e2f10327a7af6d1dae238cfe79c5' );


/** Database hostname */

define( 'DB_HOST', '127.0.0.1:3306' );


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

define( 'AUTH_KEY',         'la[qk{:m19lO$Hbk2vuLCh4GRoSJ7]x:F6mNk}d3K|$m?]i{|r} jb9tmrNHs:,K' );

define( 'SECURE_AUTH_KEY',  'S!77bx}T/zfumBL_AOo3&w]F[v44=ym037,?hD00e_wtIZzAQ(u4BWnG@HHGJR)5' );

define( 'LOGGED_IN_KEY',    'g.qa.zd5WL5$OI83iK70IR$N$zPm$>Uo0b./wdo>E*Q[Q4/V~O>hpu<^2)$fFjpv' );

define( 'NONCE_KEY',        'b8Dv9Mlb.Qz)3CYPLeElqKW,pQrd_Z&m:t7ZLcJWXU/#lP<{(<sZ(cLu0N3jEfOA' );

define( 'AUTH_SALT',        '>#6CE5,bqW=}a$L_K3sI6o&/$.7S gR|l=/?NajP}~bbX.T4DR%`uWk,bn[.P21Q' );

define( 'SECURE_AUTH_SALT', '%ClU&Brrc)u@=1ShlKrw|:!./VEDpRXt]G*(X@D!{/^zBp$gTVFfI`y:s 93Grt{' );

define( 'LOGGED_IN_SALT',   'W;4x *fwwl7+w]AS v3.@H^xW<4ai/NMOnt>zv3AEzFjD<kP-9`G<~28.)Cg:5zD' );

define( 'NONCE_SALT',       '0rl7w|VDUKi<5@N<pKt/=J3a6S<sTZ8Aw)s]goA;5` (h]K1VB/:]N0Nzm;T9T.8' );


/**#@-*/


/**

 * WordPress database table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'wp_';


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

 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/

 */

define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */




define( 'FS_METHOD', 'direct' );
/**
 * The WP_SITEURL and WP_HOME options are configured to access from any hostname or IP address.
 * If you want to access only from an specific domain, you can modify them. For example:
 *  define('WP_HOME','http://example.com');
 *  define('WP_SITEURL','http://example.com');
 *
 */
if ( defined( 'WP_CLI' ) ) {
	$_SERVER['HTTP_HOST'] = 'yingke.com.au';
}

define( 'WP_HOME', 'https://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_SITEURL', 'https://' . $_SERVER['HTTP_HOST'] . '/' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

/**
 * Disable pingback.ping xmlrpc method to prevent WordPress from participating in DDoS attacks
 * More info at: https://docs.bitnami.com/general/apps/wordpress/troubleshooting/xmlrpc-and-pingback/
 */
if ( !defined( 'WP_CLI' ) ) {
	// remove x-pingback HTTP header
	add_filter("wp_headers", function($headers) {
		unset($headers["X-Pingback"]);
		return $headers;
	});
	// disable pingbacks
	add_filter( "xmlrpc_methods", function( $methods ) {
		unset( $methods["pingback.ping"] );
		return $methods;
	});
}


/** Enable Cache */
define('WP_CACHE', true);

define( 'WP_HOME', 'https://yingke.com.au' );
define( 'WP_SITEURL', 'https://yingke.com.au' );
