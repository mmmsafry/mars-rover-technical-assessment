<?php

namespace Application\Control;

use Application\Model\Direction;
use Application\Model\Rover;
use Application\Model\RoverSetup;

class SpinLeft extends Spin implements Command
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

        $newInputSetup = $xPosition . " " . $yPosition . " " . $this->rotateFrom($orientation);
        $Rover->setSetup(new RoverSetup($newInputSetup));
    }


    /**
     * @param $currentDirection
     * @return string
     */
    protected function rotateFrom($currentDirection)
    {
        switch ($currentDirection) {
            case Direction::NORTH:
                return Direction::WEST;
            case Direction::WEST:
                return Direction::SOUTH;
            case Direction::SOUTH:
                return Direction::EAST;
            case Direction::EAST:
                return Direction::NORTH;
        }
    }
}
