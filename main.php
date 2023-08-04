<?php

$c = new ConfigFile("config.xml");

$api = new OpenApi($c);

$parms = "search: 

$api->query($parms);
