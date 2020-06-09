<?php

require "../vendor/autoload.php";

use hd\composer\core\APP;


 $app = new APP();

 $app->bootstrap();

 $db = $app->make("Database");
$db->host = "192.168.10.10";

$db2 = $app->make('Database');
dd($db2->host); 
 