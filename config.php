<?php
/*
 * First authored by Brian Cray
 * License: http://creativecommons.org/licenses/by/3.0/
 * Contact the author at http://briancray.com/
 */


// where is an sql query there is a config php, so we can include from here
require('sql.php');

// db options
define('DB_NAME', 'your db name');
define('DB_USER', 'your db username');
define('DB_PASSWORD', 'your db password');
define('DB_HOST', 'localhost');
//if you change DB_TABLE you should also change it in the relevant sql file
define('DB_TABLE', 'shortenedurls');
// either mysql or postgresql
define('DB_TYPE', 'postgresql');

// connect to database
sql_connect(DB_HOST, DB_USER, DB_PASSWORD);
sql_select_db(DB_NAME);

// base location of script (include trailing slash)
define('BASE_HREF', 'http://' . $_SERVER['HTTP_HOST'] . '/');

// change to limit short url creation to a single IP
define('LIMIT_TO_IP', $_SERVER['REMOTE_ADDR']);

// change to TRUE to start tracking referrals
define('TRACK', FALSE);

// check if URL exists first
define('CHECK_URL', FALSE);

// change the shortened URL allowed characters
define('ALLOWED_CHARS', '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');

// do you want to cache?
define('CACHE', TRUE);

// if so, where will the cache files be stored? (include trailing slash)
define('CACHE_DIR', dirname(__FILE__) . '/cache/');
