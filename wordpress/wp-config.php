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
define( 'DB_NAME', 'formulario_soporte_desarrollo' );

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
define( 'AUTH_KEY',         'd$Zl&_TcwtmI[`@Z>*z{s0li/(y2Ae_dAw`gdeID929K>4QJX`mC)+&h1y!JA%E|' );
define( 'SECURE_AUTH_KEY',  'Nt(]t`L:fmW4zQmeNz8}aMkWC<uo!Ps(nQ_~#Xy< *f7}w!s#6P]ib-y~Z.<Iv^G' );
define( 'LOGGED_IN_KEY',    '~Gd1G_4l1]0:+b6#/]}1{/*>QIu ]2|$}F=v]wQSgD@izI2!Fn0&0_U}8VQBUD`7' );
define( 'NONCE_KEY',        'lHe}I2zhdMwJ;.dA3FdpvT^X-}wXtb}Dk{{3GnF:E=zs^Bgp5WVkA6RqtcBGyP)k' );
define( 'AUTH_SALT',        '^GIDPY?G5~TT`wCCy?-f[2hMtR]OT~G.Re>pxeR~*(L)%a5ALQSd<*4pd;a-Bg>N' );
define( 'SECURE_AUTH_SALT', '<,o#P#+;wns*BgA,).6.`DBuUlL=4FFQ~%v}=sssffX$~pAJ/H`IU|?o3Z$<=?}n' );
define( 'LOGGED_IN_SALT',   '0$QG HkhW7w|^YCS9/BH<bPL}OrU A`,3FPtz+Bw.u[tL+o$Flj`Gq 9Hj>xlcr+' );
define( 'NONCE_SALT',       'h+1m2Gg7Ou1W2<G<`aFi JvCAFl7V6;)c0K(4f)yqa!Vj3V=mK-  /gOP/yrJTS-' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'fsd_';

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
