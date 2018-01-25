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
define('DB_NAME', 'sidemarketingdb');

/** MySQL database username */
define('DB_USER', 'sidemarketingdb');

/** MySQL database password */
define('DB_PASSWORD', 'h1Tgr45#2lK2@1q79yHY');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`jsQZh>N9ib|F@5xxNlcrU/77&X3NiF4xZ$aSibO@A:MjaW#*DL*YK(z+0pwzn(O');
define('SECURE_AUTH_KEY',  't!d;uzG?ieF6vbf{ofm&}uMAe,n1U_q}k8P)@gr Zxu,iRYkJU8og}?fU^nBtt9j');
define('LOGGED_IN_KEY',    'tDo~cCzM=BGDE[9;-?$n5R[8(:*4f2.D9/Kp6,WQYo}m4.l^m17+jd>)#;V*0l`R');
define('NONCE_KEY',        '4EIAcRR$H)4Krdk(}u`GyU2rx;K/+mJ4AvDLj#2dE<U{,Hq<M1Aq93|8m@ef3BTu');
define('AUTH_SALT',        '_bbB%:MqTRJDr<8qtpGhZTUbrC;:T7h :&D[rQ[?JCeV~Qd.05tdP?8gML5og).N');
define('SECURE_AUTH_SALT', 'iTx3$I&T~bv?{6]>r*(s@M;`IRB-d;~.bL4>CWtSqvyU?yT14vis9HWZa)T<6w=]');
define('LOGGED_IN_SALT',   '@O5UMU }Az7H(G9P,&4~|!T%H8B3QlzQ:6vCoX)YjfSM:9Fs}BZITZLd5UF4GI]V');
define('NONCE_SALT',       '9vxWcPb^j4@2Xxja7*Wq2Qfl~35qcO0fh+]FJXt((hsn]t|_K:9:d[5i$!%rTWc}');

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

define( 'ALLOW_UNFILTERED_UPLOADS', true );
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
