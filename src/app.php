<?php

use Application\IO\Output;
use Application\IO\PlateauInput;
use Application\IO\RoverInput;
use Application\Model\Plateau;
use Application\Model\Rover;

require_once __DIR__ . '/../vendor/autoload.php';

echo "Please provide plateau data" . PHP_EOL;
$plateauInputs = fgets(STDIN);

$output = null;

if (STDIN) {

    echo "Please provide rover coordinates data (eg: 1 2 N) and Control instruction eg: LMLMLMLMM" . PHP_EOL;
    $roverInput = fgets(STDIN);
    $roverControls = fgets(STDIN);
    $coordinateInput = PlateauInput::input($plateauInputs);
    $plateau = new Plateau($coordinateInput);

    try {
        $roverData = RoverInput::input($roverInput);
        $rover = new Rover($roverData['roverPosition'], $roverData['roverCoordinates']);
        $newPosition = $rover->processInstruction($roverControls);
        $outputObject = new Output($newPosition);
        $output = $outputObject->toString();

    } catch (Exception $e) {
        echo $e->getMessage();
    }

    echo "Result" . PHP_EOL;
    echo $output . PHP_EOL;


}
