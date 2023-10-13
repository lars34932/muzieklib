<?php
$envSettings = [];
if (file_exists(dirname(__FILE__).'/.env')) {
    $envSettings = parse_ini_file(dirname(__FILE__).'/.env');
}

define("SERVERNAME", $envSettings["SERVERNAME"]);
define("USERNAME", $envSettings["USERNAME"]);
define("PASSWORD", $envSettings["PASSWORD"]);
define("DBNAME", $envSettings["DBNAME"]);