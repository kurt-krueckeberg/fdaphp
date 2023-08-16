<?php
use Fda\OpenFda;

include "vendor/autoload.php";

$x = OpenFda::createFromXML("config.xml");

$debug = 10;

++$debug;

// https://api.fda.gov/device/event.json?search=device.device_report_product_Code=LZO

$fda = new Fda($c);

$fda->query("search=device.device_report_product_Code=LZO");

$parms = array('search' => 'device.device_report_product_Code=LZO');

$fda->query($parms);
