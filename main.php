<?php
use OpenFda/{Fda, Parms};

$c = new Config("config.xml");

$api = new Fda($c);

foreach($file as $line) {

  $parms = Parms::fromString($line, "#");

  $api->query($parms);  
}
