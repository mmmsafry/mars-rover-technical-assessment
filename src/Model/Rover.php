<?php


namespace Application\Model;


use Application\Control\Move;
use Application\Control\Spin;

class Rover
{

    /**
     * @var Direction
     */
    private $position;
    /**
     * @var Coordinate
     */
    private $coordinate;


    /**
     * Rover constructor.
     * @param Direction $roverPosition
     * @param Coordinate $roverCoordinate
     */
    public function __construct(Direction $roverPosition, Coordinate $roverCoordinate)
    {
        $this->position = $roverPosition;
        $this->coordinate = $roverCoordinate;
    }

    /**
     * @param $roverInstruction
     * @return string
     * @throws \Exception
     */
    public function processInstruction($roverInstruction)
    {
        $commands = str_split(trim($roverInstruction));

        $newCoordinate = $this->coordinate;
        $newOrientation = $this->position->getOrientation();
        $newOutput = '';

        foreach ($commands as $command) {
            if ($command == "M") {
                $move = new Move($command, $newOrientation, $newCoordinate);
                $newOutput = $move->moveRover();
            } else {
                $spin = new Spin($command, $newOrientation);
                $newOrientation = $spin->getOrientation();
            }
        }

        return $newOutput;
    }

}
