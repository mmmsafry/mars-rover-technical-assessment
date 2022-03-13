<?php

use Application\Model\Coordinate;

require_once __DIR__ . '/../vendor/autoload.php';

echo "Please provide plateau data\n";
$plateauInputs = fgets(STDIN);

$output = [];

if (STDIN) {

    echo "Please provide rover data \n";
    $roverInput = fgets(STDIN);
    $roverControls = fgets(STDIN);

    /** Setup Coordinate*/
    $coordinateInput = explode(" ", $plateauInputs);
    $coordinates = new Coordinate($coordinateInput[0], $coordinateInput[1]);

    print_r($coordinates);

}

