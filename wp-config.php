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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ritz' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '}#&:$}xE7W}j :D (>e3pTn~^8S=:tBxVGum):m@o)F.,WF6[~pU,ZSwCHczW*ew' );
define( 'SECURE_AUTH_KEY',  'AW9tJvqDhpfLh!jdf|n6DVaN[V5Gr9+NSGEGQoAFH<4,OKUlLDDa5jM c7gbhpdz' );
define( 'LOGGED_IN_KEY',    'p]XyohlTgPS,8D&P}Ow6cW&_2?wqF+QNQ) l~!} a&rseUM~HgJgni[r-gJ=`e!S' );
define( 'NONCE_KEY',        'rLee.^)<vAcTRJC i*hL7LKtG|41[$XHm{*g!g76 Y~_)@P#FYH~#5WmyDMWR0q{' );
define( 'AUTH_SALT',        'NaUn#ho.,v[$7k$Xr#O+EVz.S!h`}CznalV}][dEaFGsTNz|Jc2=>uzK&[WwiUW&' );
define( 'SECURE_AUTH_SALT', 'v!&#,?71kiP$uTDM0P 55F*5,]t[>N,L|@w#49IrY>}<9(KkN`v-?:t=n6bGkhsv' );
define( 'LOGGED_IN_SALT',   'GMiL#6jAcVV3}`Ni/(-abK1V=Fsuc3b6lLDYb>X>lqDapdD{nK@,EzQK(AwV>Fg1' );
define( 'NONCE_SALT',       '3Q$I6,yzeAkNqrXg5,*eBELi&*^Fi~PcPr/];BiM]xR$yCIr@z;IA0Yza?LRhg0D' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_Display', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
