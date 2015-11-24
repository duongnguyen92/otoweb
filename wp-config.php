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
define('DB_NAME', 'otoweb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'gH:-bZIH5`~2oRuqR|A8LY7hD$VP+Vk|[8GV/A*%u+&Y~]t?trcCS~K$8+FAaN+N');
define('SECURE_AUTH_KEY',  '0g&srp/1=?7^#[ZiP?=Wdw(xmY8!2fZ[:+ ^ftI%p -u:K/T->Sv {yD<({%iMv9');
define('LOGGED_IN_KEY',    'p5`;mz_TIF.xL{/4Nn-@y+CNp2mG}pgyE8:@u,$$<&Q<qQ-<smM:4-b?BADNA.(L');
define('NONCE_KEY',        '79s,l=[R(S-)If0[]0xqu-b0`1ZVE)sAmP;i:^$/dxL0L5H.m#LcJ~vZ1B=AR>qG');
define('AUTH_SALT',        'a6leb:Jg*/;|mhK1MNcPS-v []K+%A%9f1Gvqo4<8d2d8KI0T[F;[y)b_MNA/k/w');
define('SECURE_AUTH_SALT', '%7DKU<T]hGitoB~3L`I/t5Pc^jR:&2|xtIL/|{s4aF?*A-:=)@|-w-<`[cZdGz!j');
define('LOGGED_IN_SALT',   'NKoY$:rM-?wNt_oD$- zJo3h+v}z-zc-yKohkW^i]=mN>~]*MUO8K{u2%Sz^i-y|');
define('NONCE_SALT',       ' #|c^9Qy+*(|c_vYJ,Uw-$^DCBxa(4ed61+|%GgwiI[!4=]vM!B^,Y{Dc--,2Dhp');

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
