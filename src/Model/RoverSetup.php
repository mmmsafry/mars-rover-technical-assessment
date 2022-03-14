<?php


namespace Application\Model;


use Exception;

class RoverSetup extends Plateau
{
    /**
     * @var Coordinate
     */
    private $Coordinate;
    /**
     * @var Direction
     */
    private $Direction;

    /**
     * RoverSetup constructor.
     * @param string $currentSetupInput
     * @throws Exception
     */
    public function __construct($currentSetupInput)
    {
        $currentSetup = explode(" ", $currentSetupInput);
        $this->Coordinate = new Coordinate($currentSetup[0], $currentSetup[1]);
        $this->Direction = new Direction($currentSetup[2]);
    }


    /**
     * @return Coordinate
     */
    public function getCoordinate()
    {
        return $this->Coordinate;
    }

    /**
     * @return Direction
     */
    public function getDirection()
    {
        return $this->Direction;
    }


    /**
     * @return string
     */
    public function toString()
    {
        return $this->Coordinate->getX() . " " . $this->Coordinate->getY() . " " . $this->Direction->getOrientation();
    }
}
