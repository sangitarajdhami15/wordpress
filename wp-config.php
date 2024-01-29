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
define( 'DB_NAME', 'sangita' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'aSw. B{29D;?/OwZerh|K^v.~8XXG:zR~30y_{_,wI^y)F22A!2OdQf}c-9^S~4j' );
define( 'SECURE_AUTH_KEY',  'eF#B!0(ja@whMjYxTMK>p1AA`SspD7 22(}~46L/Q`FNQPp&*)Y^RU`Jd0HXg4d=' );
define( 'LOGGED_IN_KEY',    '2U/DQ/a:/+c;&>yxx]%&@&;,mz_3^4C_Bo 7f/L0VHPn>Qz, F[1^Gr~8g%QxGh$' );
define( 'NONCE_KEY',        '/5{wJn{mgN+:EvTTEr6o6oS(x3Cto&UiOOs^.I|?KA(eif.~$vO7_.U/2dLvqoHe' );
define( 'AUTH_SALT',        'L93K=p_^Hf?[{ MFyK}P@vB=![[NNmVYQBVsT{0ZkxY(ce>FY79`[>W!u~mzbebT' );
define( 'SECURE_AUTH_SALT', 'w}.9c[rw`v{(HBu&Sc&e^Sx2j8<EB;A9(ekjIo6L 3!T!I`$%k%E5>7VTI@]snBN' );
define( 'LOGGED_IN_SALT',   'm-MI1DDcUzqUJW.ZJ4L#;Cv^[CuG Zp7pj@/0H1(<.&l>>O()B:HkCP6b:{}IgZz' );
define( 'NONCE_SALT',       '1Gl&I/4u6U(Xz}a*+_s+^gb1|:CE&ip1}{^bGaB;MEl=f3rN~AO7_%Y [ccQK8X}' );

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
