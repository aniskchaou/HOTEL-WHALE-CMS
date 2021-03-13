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
define( 'DB_NAME', 'hotel-whale' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '#}G$4}_aJS={CbZKBc=nSUXe{*HJi{vNm(OM_GNSV{>J^pzp|TB($ke )R._pj`i' );
define( 'SECURE_AUTH_KEY',  'ZLTabO@&uf]0VedeLHoBD*Y$D`49ap3^/iS+I6?vHUVq^Y a@OZ2[:0b>PO?/_LI' );
define( 'LOGGED_IN_KEY',    '[>G]wNVGCi]^=E?VA1c4rsBS3cj|wlmfTt{G_B&I2BNsUWJ-np@bN{Bn.+ZtV,4:' );
define( 'NONCE_KEY',        '?}}=Wec9*ONQ!>p:gPf[LOz%PYTBO)[H9Gvk^G@>=!/P;1mJ(Oh@z/Iy4If4q5ww' );
define( 'AUTH_SALT',        '=B`Iu3ImwzHn&/G04}G| 1e?.@aH}L*~;-IH~sK9Sn[EMLNVG0_s/7b.=~* -?k-' );
define( 'SECURE_AUTH_SALT', ':?nVD}8J7-<ux5cihj!?H]R)y({W4,rgX5Z}Ay6z+EUx xx&PDW0B):S)Z,)8juX' );
define( 'LOGGED_IN_SALT',   '=el,9`}_Dzhe@D#`S/LC#k*Ux/@i|{fO}- 1j[Jpsd+6(NsrX;N>6TC}~;3cUU1)' );
define( 'NONCE_SALT',       'amXihwf^|!`P[t{e%)Vn5^u5l(NCUVp197|61[W;eT{~x[R&hrF<dq9}moH}`4uy' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
