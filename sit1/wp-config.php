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
define( 'DB_NAME', 'wordpress_tut' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '0792290321' );

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
define( 'AUTH_KEY',         'Dqq*RtV(z:=6H)Z&Oi-O]<Hm/@H-W5VV.Si~4P<?=U}0N=@)K4b1;sYnxRfersEc' );
define( 'SECURE_AUTH_KEY',  'lyq;$$D4vk4D.Q-vV{|2#YH$c;oBl%LS,9=@u]o|(L|-6AMF4os4eDs$>/<V(oqt' );
define( 'LOGGED_IN_KEY',    '/4{;U%.%3aRS_PVYP4s_(];yTjD%r3l!^^A`Gu gaf5C/dSv4*)dRI_z#<;xo/m)' );
define( 'NONCE_KEY',        'ILP8]9vx#Ldav , G2G:`w!:+^mrnH^olY2m#7$!S:N|/Ors>.dA*K,QIRkS4hq;' );
define( 'AUTH_SALT',        ';6:/)3FP//mGnxKV8tW(O.|SJ|H j&f]`rCfxOWBh9ylk1a+]1dfuReMo]o#QJ<Y' );
define( 'SECURE_AUTH_SALT', '}h`Zyf)+(8 @1<F$20O#V3Ewnaa_m8$Kjye5%=/:fQ4g>5U4%k+ -1Q+9mXnBw70' );
define( 'LOGGED_IN_SALT',   '/sLNG$=^+C{Xi,OmRuh*29F{ C~bwpJlB$oaaO#WI+grE#Bt-;{B!zfltxc*>Xc9' );
define( 'NONCE_SALT',       'zS89a=1X&mJAwO]s33&IB$}&!xp#ErE&BleQy6t0a8GY;KB}r_+{T.9^Cc5W6NdZ' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
