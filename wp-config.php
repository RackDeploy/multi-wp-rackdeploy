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

// $onGae is true on production.
if (isset($_SERVER['GAE_ENV'])) {
    $onGae = true;
} else {
    $onGae = false;
}

// Cache settings
// Disable cache for now, as this does not work on App Engine for PHP 7.2
define('WP_CACHE', false);

// Disable pseudo cron behavior
define('DISABLE_WP_CRON', true);

// Determine HTTP or HTTPS, then set WP_SITEURL and WP_HOME
if ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)) {
    $protocol_to_use = 'https://';
} else {
    $protocol_to_use = 'http://';
}
if (isset($_SERVER['HTTP_HOST'])) {
    define('HTTP_HOST', $_SERVER['HTTP_HOST']);
} else {
    define('HTTP_HOST', 'localhost');
}
define('WP_SITEURL', $protocol_to_use . HTTP_HOST);
define('WP_HOME', $protocol_to_use . HTTP_HOST);

// ** MySQL settings - You can get this info from your web host ** //
if ($onGae) {
    require_once(ABSPATH . 'kms.php');
    /** The name of the Cloud SQL database for WordPress */
    define('DB_NAME',     getenv('DB_NAME'));
    /** Production login info */
    define('DB_HOST',     getenv('DB_HOST'));
    define('DB_USER',     getenv('DB_USER'));
    define('DB_PASSWORD', getenv('DB_PASS'));
} else {
    /** The name of the local database for WordPress */
    define('DB_NAME', 'wordpress');
    /** Local environment MySQL login info */
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'password');
}

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
define('AUTH_KEY',         '4Jjp2S75iiqgk9nxvbZV7TmuJoOZha5UIU3Xq0FB9lpTmW6u7Wo2yf9eEgG6rGCcc7qnsLh0V35AMyCw');
define('SECURE_AUTH_KEY',  'PNN1yZVXrqU6Uy0dy5GtfCnhmtcjDvKL6ObK8Q+MMv9fHujn1iZ2SeniaA18ntozIU3DCy80eKF8MkpG');
define('LOGGED_IN_KEY',    'LMJ4S/Y0zqlHnCsVqNo5CuK9LMaWzvlk4SlnvlNdOkCzTdq5dX7S8hKc5E1DYpf7xVPjTUrDS3ai+m/q');
define('NONCE_KEY',        'VhPyUpIzJQam1cetoTEnPgwi5At4DT9KNMMXoF7/6aGNd030GMTDMiS3ckyJpg6nz7R1n3rU3FE3r862');
define('AUTH_SALT',        'x4MKdA3mHMFCXcQHAquX39aDvKkKr+KfeJ/Wl4mjQTlrfKZFTrgFyjn2t53gg3FByqVpXvyLyc0mz76L');
define('SECURE_AUTH_SALT', 'ieMm88FELvYTUGb2DZysMLFq5urXNIeXNxLsjPsDpqnp5fV7/ufATPhIjrQhkwexMBdv1o9bMdMUTlYA');
define('LOGGED_IN_SALT',   'VuHWY/aYE3WnmM+aWnZNy/35zxvNuyU9cauFEol2Ycqji6o3Ech5PNBdo/hOn8jHFRPdIyMc62Suhwcb');
define('NONCE_SALT',       'U11wlIuUeDu3ksgrUk1gFxhBx/R7JFcFTTscCL8G+jkvYi4Qh6913AcXjf7IHxq3Lfc5j5uJx3CyjABV');

/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', !$onGae);

/* That's all, stop editing! Happy blogging. */


/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/wordpress/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
