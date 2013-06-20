<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_fiesta');

/** MySQL database username */
define('DB_USER', 'user_fiesta');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('WP_HOME','http://fiesta.dev');
define('WP_SITEURL','http://fiesta.dev/wordpress');
//define('WP_DEBUG', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'PP>Ii~HW=0lH1#ahJu-=-f(ky#ki+TL^2=i8,}}|^Xz,o8f:Hh?8u;1=+$;[jI4[');
define('SECURE_AUTH_KEY',  '<VLnmhcQKiz5bqfD3Udp8`+?.,c=9q+S5/v{yAjP]{Q+9|<!;L.f-Z0E6dpg0Odg');
define('LOGGED_IN_KEY',    '6Fmn9-8<eBF3Y|i`X096,-LlfkMlp+U~N W~X0e<U~c5AI/.!D+>sRTDpU[$[f$&');
define('NONCE_KEY',        '9sotG~q^fX^Sa,O7?F@Gz`yGF;1nz>KrFsyhq9W0?z` Gf7_ZGI*r+B+CIgP@R-C');
define('AUTH_SALT',        'rfVv,~nBp|0ZwxPC]+$th_$}n;4i4P{^vj&MHh1uejB2yDsUx*]^n+=1cX2f7OuL');
define('SECURE_AUTH_SALT', 'WTX-bH#rX+!5^oHV$}!SO*Qqo_i#+?qC($bOOXtz1[_f@O?A,=fK(naTY7X&kzrq');
define('LOGGED_IN_SALT',   '|-M)KS2@nI*BP@+VpY6lgDmB,/q+5VHfD+9mJqFK0c|PPy/4{ze1gl~B?2N@XPM<');
define('NONCE_SALT',       '/UZjJ h7;0tq;+>Z_7|qMs5 gnp?J1!vK&sg3S2&4Ye|;g/U)dOyI+A_yy0Eck[m');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_otq0r3_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');