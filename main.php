<?php
declare(strict_types=1);
use OpenFda\OpenClient;

include "vendor/autoload.php";

$api = new OpenClient("config.xml");

$file = new \SplFileObject($queries);

/*
foreach($file as $line) {

  $parms = Parms::fromString($line, "#");

  $api->query($parms);  
        
    echo $line . "\n";
}
*/
$config = new Config($argv[1]);


foreach($file as $line) {

  $parms = Parms::fromString($line, "#");

  $api->query($parms);  
        
    echo $line . "\n";
}
