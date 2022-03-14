<?php


namespace Application\Control;

use Application\Model\Direction;
use Application\Model\Rover;
use Application\Model\RoverSetup;

class MoveHead implements Command
{
    /**
     * @param Rover $Rover
     * @throws \Exception
     */
    public function execute(Rover $Rover)
    {
        $setup = $Rover->getSetup();
        $xPosition = $setup->getCoordinate()->getX();
        $yPosition = $setup->getCoordinate()->getY();
        $orientation = $setup->getDirection()->getOrientation();

        switch ($orientation) {
            case Direction::NORTH:
                $newInputSetup = $xPosition . " " . ($yPosition + 1) . " " . $orientation;
                $Rover->setSetup(new RoverSetup($newInputSetup));
                break;
            case Direction::WEST:
                $newInputSetup = ($xPosition - 1) . " " . $yPosition . " " . $orientation;
                $Rover->setSetup(new RoverSetup($newInputSetup));
                break;
            case Direction::EAST:
                $newInputSetup = ($xPosition + 1) . " " . $yPosition . " " . $orientation;
                $Rover->setSetup(new RoverSetup($newInputSetup));
                break;
            case Direction::SOUTH:
                $newInputSetup = $xPosition . " " . ($yPosition - 1) . " " . $orientation;
                $Rover->setSetup(new RoverSetup($newInputSetup));
                break;
        }
    }
}

