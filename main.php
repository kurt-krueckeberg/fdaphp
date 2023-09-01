<?php
declare(strict_types=1);

$x = 10;

$api = new OpenFda\OpenClient("config.xml");

foreach($file as $line) {

  $parms = Parms::fromString($line, "#");

  $api->query($parms);  
}
