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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'afrizalm_wp712' );

/** MySQL database username */
define( 'DB_USER', 'afrizalm_wp712' );

/** MySQL database password */
define( 'DB_PASSWORD', 'v7p@6S.eD2' );

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
define( 'AUTH_KEY',         'wxvmbln2nnzoummpef3dvsqlfntvahrrmjnj85h986et92tvkc6po9wavqmncnoj' );
define( 'SECURE_AUTH_KEY',  '4gqmvft1ykpofl3qcsedyjtml9mievmwfqr7xqz7rbnurzfifubiiaqxoo7f61lx' );
define( 'LOGGED_IN_KEY',    'dw5ibmfybannjc6jyfwv0uo3mwragzkkuzhantxvutyfsrqrtfofzs3zeo4hjbih' );
define( 'NONCE_KEY',        'demqigfr4jcvs7zuiqepjklvdcmzeaav3ekcs2wnppmmkzypv2x11twyyluykmp4' );
define( 'AUTH_SALT',        'xkp7ktwupopwcoorv2ffmtb76cwmhpqidzwocnjvcnhkg7zeeofooh30mgob536b' );
define( 'SECURE_AUTH_SALT', 'xz1qn5cei54juzm0x5azdh7fnfjeg5r9vfma7urvzdoqtj9jibw7ymdvguzj6ojq' );
define( 'LOGGED_IN_SALT',   'avei2gmdwkoneub6t3epnv9aikgrpr7eqkbflwflioafqyjhjvxlck5rmptapsbu' );
define( 'NONCE_SALT',       'jihaxx6zjjgmjhi0avxjs7ze61plu2wbyur3opjqdfonm2bllvizgyrh90e0ehw0' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpzh_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
