<?php
require "TimeTravel.php";

$marty = new \wcs\TimeTravel(new DateTime('1985-12-31 08:10:20'), new DateTime('1984-02-20 09:20:10'));

$marty->getTravelInfo();


echo "<pre>";
var_dump($marty->getTravelInfo());

var_dump($marty->findDate(1000000000));

var_dump($marty->backToFutureStepByStep());
echo "</pre>";