<?php


namespace Application\Control;


use InvalidArgumentException;

class Move
{

    const MOVE = "M"; // move forward one grid point
    const GRID_POINT = 1;

    /**
     * Move constructor.
     * @param $command
     */
    public function __construct($command)
    {
        if (!in_array($command, [self::MOVE])) {
            throw new InvalidArgumentException(sprintf(
                '%s is not a defined command. Allowed Commands : %s',
                $command,
                implode(',', [self::MOVE])
            ));
        }
    }

    /**
     * @param $value
     * @return int
     */
    public function factor($value)
    {
        return self::GRID_POINT * $value;
    }

}
