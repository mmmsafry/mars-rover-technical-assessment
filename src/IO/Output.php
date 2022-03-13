<?php


namespace Application\IO;

use Application\Model\Coordinate;
use Application\Model\Direction;


class Output
{
    private $coordinate;
    private $orientation;

    /**
     * Output constructor.
     * @param string $currentSetupInput
     * @throws \Exception
     */
    public function __construct($currentSetupInput)
    {
        $currentSetup = explode(" ", $currentSetupInput);
        $this->coordinate = new Coordinate($currentSetup[0], $currentSetup[1]);
        $this->orientation = new Direction($currentSetup[2]);
    }

    public function toString()
    {
        return $this->coordinate->getX() . " " . $this->coordinate->getY() . " " . $this->orientation->getOrientation();
    }

    public function getCoordinate()
    {
        return $this->coordinate;
    }

    public function getDirection()
    {
        return $this->orientation;
    }
}
