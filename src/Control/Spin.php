<?php

namespace Application\Control;

use Application\Model\Direction;
use InvalidArgumentException;

class Spin
{
    const LEFT = 'L';
    const RIGHT = 'R';

    /**
     * @var string
     */
    private $spin = '';

    /**
     * @var string
     */
    private $direction;

    /**
     * Spin constructor.
     * @param string $input
     * @param string $currentDirection
     */
    public function __construct($input, $currentDirection)
    {
        if (!in_array($input, [self::LEFT, self::RIGHT])) {
            throw new InvalidArgumentException(
                sprintf("Invalid spinning, following directions only available %s", $input)
            );
        }
        $this->direction = $currentDirection;
        $this->spin = $input;
    }

    /**
     * @return string
     */
    public function getOrientation()
    {
        if ($this->spin === self::LEFT) {
            return $this->rotateLeft($this->direction);
        }
        return $this->rotateRight($this->direction);
    }

    /**
     * @param $currentDirection
     * @return string
     */
    private function rotateLeft($currentDirection)
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

    /**
     * @param $currentDirection
     * @return string
     */
    private function rotateRight($currentDirection)
    {
        switch ($currentDirection) {
            case Direction::NORTH:
                return Direction::EAST;
            case Direction::EAST:
                return Direction::SOUTH;
            case Direction::SOUTH:
                return Direction::WEST;
            case Direction::WEST:
                return Direction::NORTH;
        }
    }

}
