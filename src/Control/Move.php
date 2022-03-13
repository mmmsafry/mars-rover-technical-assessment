<?php


namespace Application\Control;


use Application\Model\Coordinate;
use Application\Model\Direction;
use InvalidArgumentException;

class Move
{

    const MOVE = "M"; // move forward one grid point
    const GRID_POINT = 1;

    /**
     * @var string
     */
    private $direction;

    /**
     * @var Coordinate
     */
    private $coordinate;

    /**
     * Move constructor.
     * @param string $command
     * @param string $direction
     * @param Coordinate $coordinate
     * @throws \Exception
     */
    public function __construct($command, $direction, Coordinate $coordinate)
    {
        if (!in_array($command, [self::MOVE])) {
            throw new InvalidArgumentException(sprintf(
                '%s is not a defined command. Allowed Commands : %s',
                $command,
                implode(',', [self::MOVE])
            ));
        }
        $this->direction = $direction;
        $this->coordinate = $coordinate;
    }


    /**
     * @return string
     * @throws \Exception
     */
    public function moveRover()
    {
        switch ($this->direction) {
            case Direction::NORTH:
                return $this->coordinate->getX() . " " . ($this->coordinate->getY() + self::GRID_POINT) . " " . $this->direction;

            case Direction::WEST:
                return ($this->coordinate->getX() - self::GRID_POINT) . " " . $this->coordinate->getY() . " " . $this->direction;

            case Direction::EAST:
                return ($this->coordinate->getX() + self::GRID_POINT) . " " . $this->coordinate->getY() . " " . " " . $this->direction;

            case Direction::SOUTH:
                return $this->coordinate->getX() . " " . ($this->coordinate->getY() - self::GRID_POINT) . " " . $this->direction;
        }
    }

}
