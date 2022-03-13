<?php

use Application\IO\PlateauInput;
use Application\IO\RoverInput;
use Application\Model\Plateau;

require_once __DIR__ . '/../vendor/autoload.php';

echo "Please provide plateau data" . PHP_EOL;
$plateauInputs = fgets(STDIN);

$output = [];

if (STDIN) {

    echo "Please provide rover data " . PHP_EOL;
    $roverInput = fgets(STDIN);
    $roverControls = fgets(STDIN);


    $coordinateInput = PlateauInput::input($plateauInputs);

    $plateau = new Plateau($coordinateInput);

    print_r($plateau);

    try {
        $roverCoordinate = RoverInput::input($roverInput);

        echo "Rover Coordinate ";
        print_r($roverCoordinate);
        echo "The End App" . PHP_EOL;

    } catch (Exception $e) {
        echo $e->getMessage();
    }



}

