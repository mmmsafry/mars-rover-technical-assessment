<?php

namespace Application\Model;


class Direction
{
    const NORTH = "N";
    const WEST = "W";
    const EAST = "E";
    const SOUTH = "S";

    private $direction = "";

    /**
     * @return string
     */
    public function getOrientation()
    {
        return $this->direction;
    }

    /**
     * Direction constructor.
     * @param $direction
     * @throws \Exception
     */
    public function __construct($direction)
    {
        $direction = trim($direction);
        if ($this->isValid($direction)) {
            $this->direction = $direction;
            return;
        }
        throw new \Exception("Invalid input direction given: " . $direction);
    }


    /**
     * @param $orientation
     * @return bool
     */
    private function isValid($orientation)
    {
        return in_array(
            $orientation,
            [
                self::NORTH,
                self::WEST,
                self::EAST,
                self::SOUTH
            ]
        );
    }

}
