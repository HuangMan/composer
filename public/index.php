<?php

require "../vendor/autoload.php";

use hd\composer\core\APP;


 $app = new APP();

 $app->bootstrap();

 $db = $app->make("Database",false);
$db->host = "192.168.10.10";
 