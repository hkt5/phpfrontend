<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 20.01.18
 * Time: 18:06
 */

define( 'DB_HOST', 'localhost' ); // set database host
define( 'DB_USER', 'root' ); // set database user
define( 'DB_PASS', 'R3v3l@t104' ); // set database password
define( 'DB_NAME', 'ths' ); // set database name
define( 'DISPLAY_DEBUG', true ); //display db errors?

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/src/Router.php';

require __DIR__ . '/src/Bootstrap.php';

error_reporting(E_ALL);