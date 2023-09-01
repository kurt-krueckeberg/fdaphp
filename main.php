<?php
declare(strict_types=1);

use OpenFda\{OpenFda, Parms};

$api = new OpenFda("config.xml");

foreach($file as $line) {

  $parms = Parms::fromString($line, "#");

  $api->query($parms);  
}
