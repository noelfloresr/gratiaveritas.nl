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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gratia_development' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'uwFHn^/%#:?XR=%4h,PCY.d41 5DRLAA0Cky4Dh?ZKG=u*|;ggPh[Q;S;:J{_P`d' );
define( 'SECURE_AUTH_KEY',  '| dY,Nr9x?!j2)dKua YsDlp.{H8|Z^u[Kx, ;#8=R(HQhL1CjFhYfPxzox77?O!' );
define( 'LOGGED_IN_KEY',    '2(`b)}7HOS^/MH3jn=u$d|TvT`,`{mPri%i.S?ZVS)}dz= =~svC+x:|F2S5t#iJ' );
define( 'NONCE_KEY',        'fjC&`g%BFQr),W)D:= w6A(`1%^>Xs^T+;l5mBG2`vf%|Fe~9)F;F,Vxa=l2HPwL' );
define( 'AUTH_SALT',        'In*Ar]wazGT5J18J}dPw_kPo`0gsDUWpI*]U3DGXN[oc,v{WY9q!2X4rV&=53F-*' );
define( 'SECURE_AUTH_SALT', 'B1ieT!<c[qsBI5U4)+zlwXAreR(V=*Sat857i~cQ2r}WE*3uCQ^-9VnyAQ3$VyWn' );
define( 'LOGGED_IN_SALT',   'X!Us=^mfCTFY[,+7Tf1noXBSs478he)bt4]syKTok2X#i6j/U!(#Vr9<]f&zoyqP' );
define( 'NONCE_SALT',       '*xK*kg oH:tLa`.t--})reOf;2b64}Chey7xj;Tk`?,Vsr.]<K?l$}^.Di^DPSaY' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
