<?php
declare(strict_types=1);
use OpenFda\OpenClient;

include "vendor/autoload.php";

$api = new OpenClient("config.xml");

foreach($file as $line) {

    /*
  $parms = Parms::fromString($line, "#");

  $api->query($parms);  
      */
    
    echo $line . "\n";
}
