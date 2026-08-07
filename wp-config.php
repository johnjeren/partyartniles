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

 /**
 * Load environment variables from .env file
 */
$env_file = __DIR__ . '/.env';
if (file_exists($env_file)) {
    $lines = file($env_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            // Strip one layer of matching surrounding quotes, so that both
            // FOO=bar and FOO='bar' yield the same value.
            if (strlen($value) > 1 && $value[0] === $value[strlen($value) - 1]
                && ($value[0] === '"' || $value[0] === "'")) {
                $value = substr($value, 1, -1);
            }
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
            putenv("$key=$value");
        }
    }
}

// Fail loudly on a missing value rather than defining a null constant. An unset
// salt would make WordPress hash cookies against an empty key, which is
// predictable across sites — worse than not rotating at all.
foreach ([
    'DB_NAME', 'DB_USER', 'DB_PASSWORD', 'DB_HOST',
    'AUTH_KEY', 'SECURE_AUTH_KEY', 'LOGGED_IN_KEY', 'NONCE_KEY',
    'AUTH_SALT', 'SECURE_AUTH_SALT', 'LOGGED_IN_SALT', 'NONCE_SALT',
] as $required_key) {
    if (empty($_ENV[$required_key])) {
        exit('Configuration error: ' . $required_key . ' is missing from .env');
    }
}




// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV['DB_NAME'] );

/** MySQL database username */
define( 'DB_USER', $_ENV['DB_USER'] );

/** MySQL database password */
define( 'DB_PASSWORD', $_ENV['DB_PASSWORD'] );

/** MySQL hostname */
define( 'DB_HOST', $_ENV['DB_HOST'] );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

// Enable WP_DEBUG mode
define( 'WP_DEBUG', filter_var( $_ENV['WP_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN ) );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', $_ENV['WP_DEBUG_LOG'] );

// Disable display of errors and warnings
define( 'WP_DEBUG_DISPLAY', $_ENV['WP_DEBUG_DISPLAY'] );
@ini_set( 'display_errors', 0 );

// Suppress translation loading notices
@ini_set('error_reporting', E_ALL & ~E_NOTICE);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         $_ENV['AUTH_KEY']);
define('SECURE_AUTH_KEY',  $_ENV['SECURE_AUTH_KEY']);
define('LOGGED_IN_KEY',    $_ENV['LOGGED_IN_KEY']);
define('NONCE_KEY',        $_ENV['NONCE_KEY']);
define('AUTH_SALT',        $_ENV['AUTH_SALT']);
define('SECURE_AUTH_SALT', $_ENV['SECURE_AUTH_SALT']);
define('LOGGED_IN_SALT',   $_ENV['LOGGED_IN_SALT']);
define('NONCE_SALT',       $_ENV['NONCE_SALT']);

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
#define( 'WP_DEBUG', true );

define( 'DISALLOW_FILE_EDIT', true );
define( 'DISALLOW_FILE_MODS', true );

define( 'WP_HOME', $_ENV['WP_HOME'] ?? '' );
define( 'WP_SITEURL', $_ENV['WP_SITEURL'] ?? '' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
