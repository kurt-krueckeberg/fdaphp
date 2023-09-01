<?php
declare(strict_types=1);

include "vendor/autload.php";

$x = 10;

$api = new OpenFda\OpenClient("config.xml");

foreach($file as $line) {

  $parms = Parms::fromString($line, "#");

  $api->query($parms);  
}
