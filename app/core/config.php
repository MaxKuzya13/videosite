<?php

defined('ROOTPATH') OR exit ('Access Denied');

if($_SERVER['SERVER_NAME'] == 'localhost')
{
//    database config
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define("ROOT", 'http://localhost/videosite/public');

} else {
//    database config
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define("ROOT", 'https://www.yourwebsite.com');

}

define ('APP_NAME', 'My video website');
define ('APP_DESC', 'Best video website on the planet');

// True means show errors
define('DEBUG', true);