<?php
$envSettings = [];
if (file_exists(dirname(__FILE__).'/.env-hidden-k12da1')) {
    $envSettings = parse_ini_file(dirname(__FILE__).'/.env-hidden-k12da1');
}

define("SERVERNAME", $envSettings["HOST"]);
define("USERNAME", $envSettings["USER"]);
define("PASSWORD", $envSettings["PASSWORD"]);
define("DBNAME", $envSettings["NAME"]);