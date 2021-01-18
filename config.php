<?php
session_start();
ob_start();

define('DBDRIVE', 'mysql:');
define('DBHOST', 'host=localhost;');
define('DBNAME', 'dbname=db_apirest');
define('DBUSER', 'root');
define('DBPASS', '');

define('PATH', 'http://localhost/projetos/linguagens/PHP_api-rest/');

spl_autoload_register(function ($class) {

    $arr = explode('\\', $class);
    $class = array_pop($arr);

    $paths = [
        "./controllers/$class.php",
        "./models/$class.php",
        "./services/$class.php",
        "./routes/$class.php",
        "./apis/$class.php",
        "./ajax/$class.php",
    ];

    foreach ($paths as $path) {

        if (file_exists($path)) {
            include_once $path;
        }

    }

});
