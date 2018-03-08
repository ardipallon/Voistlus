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
define('DB_NAME', 'ardikris_wordpress');

/** MySQL database username */
define('DB_USER', 'ardikristiin');

/** MySQL database password */
define('DB_PASSWORD', '*A4;m0Qc(!##');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_MEMORY_LIMIT', '256M');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'B(&ic~*f>BZ?^zU2Qw]mSO|_s(Fh~U7q,v.sq:8 )?n:P}($Z5/9+S+u~-=,q?d$');
define('SECURE_AUTH_KEY',  ' WI$J9e&qAFXK4xcImaI<:9]J<{bLg<T&uyXv3EqFePpWw[e{lfOtM/4i4#:,jNu');
define('LOGGED_IN_KEY',    'R4frQF9|d:dLWO}EfmEqrnh4SO?]ooW#l;?{jY,Yq=,^TC>:g,qUi#]sT3JO}xJ~');
define('NONCE_KEY',        'EW6dNNR+)ST:3o9K*1}Gze<SzZLIeV~|T%`T)%!F$`[p%X5zw[1mLrY]|0w_jPEh');
define('AUTH_SALT',        'q%]2}yp6!iVn84jN%V{,we8!S*^a)k^Ki%et+Aa/a;nc7%4?@YxJ,p7J5g<~Y`I;');
define('SECURE_AUTH_SALT', 'PD=(,IB5-1 [W4>t2{>ruIW;C X9`BfMxCFGH-t3b#__yl&`t1Nmoe+?`t!(l$Vf');
define('LOGGED_IN_SALT',   'J:E:47H3[5Pokw-CRP^@;v-);YQZiU0w6cu/nj+Ys`IT;{)=)XXO]eST]yzbnD9I');
define('NONCE_SALT',       'jx5Tn;vqH&s1}#%H:ezb2W Mn25>+@O<=4 2wcw]yDQ(51m=j.RifgD2VW^lH^gT');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
