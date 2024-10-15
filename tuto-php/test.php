<?php

// require 'class/Creneau.php';
require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . "Creneau.php";

require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . "Form.php";

$creneau = new Creneau(9, 12);
$creneau2 = new Creneau(14, 16);

var_dump($creneau, $creneau2);

var_dump(
    $creneau->inclusHeure(10),
    $creneau2->inclusHeure(10)
);

var_dump($creneau->intersect($creneau2));

echo $creneau->toHTML();

// -----------------------------------------------


echo Form::checkbox('demo', 'Demo', []);


