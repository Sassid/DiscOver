<?php

// require 'class/Creneau.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . "Creneau.php";

$creneau = new Creneau();
$creneau->debut = 9;
$creneau->fin = 12;

var_dump($creneau);
