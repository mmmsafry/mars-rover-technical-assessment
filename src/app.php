<?php

use Application\Model\CommandsInputParser;
use Application\Model\Coordinate;
use Application\Model\Plateau;
use Application\Model\Rover;
use Application\Model\RoverSetup;
use Application\Model\RoverSquad;

require_once __DIR__ . '/../vendor/autoload.php';

echo "Please provide plateau data" . PHP_EOL;
$plateauInputs = fgets(STDIN);

if (STDIN) {

    $plateauBorders = explode(" ", $plateauInputs);
    $coordinate = new Coordinate($plateauBorders[0], $plateauBorders[1]);
    $plateau = new Plateau($coordinate);

    echo "Please provide rover coordinates data (eg: 1 2 N) and Control instruction eg: LMLMLMLMM" . PHP_EOL;

    $roverSquad = new RoverSquad();
    $i = 0;
    $squad = 0;

    while (($input = trim(fgets(STDIN))) != "") {
        if ($i == 0) {
            if ($roverSquad->offsetExists($squad) == false) {
                $rover = new Rover();
                try {
                    $rover->setSetup(new RoverSetup($input));
                } catch (Exception $e) {
                    echo 'Error : ' . $e->getMessage();
                }
                $roverSquad->offsetSet($squad, $rover);
            }
            $i++;
        } elseif ($i == 1 && $roverSquad->offsetExists($squad)) {
            $rover = $roverSquad->offsetGet($squad);
            try {
                $rover->setCommands((new CommandsInputParser($input))->getCommandsCollection());
            } catch (Exception $e) {
                echo 'Error : ' . $e->getMessage();
            }
            $i = 0;
            $squad++;
        }
    }
    $roverSquad->execute();
    echo $roverSquad->getRoversSetupAsString() . PHP_EOL;


}
