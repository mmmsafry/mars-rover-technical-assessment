<?php


namespace Application\IO;


use Application\Model\Coordinate;
use Application\Model\Direction;
use InvalidArgumentException;

class RoverInput
{
    /**
     * @param $input
     * @return array
     * @throws \Exception
     */
    public static function input($input)
    {
        $roverInput = explode(' ', trim($input));

        if (count($roverInput) !== 3) {
            throw new InvalidArgumentException('Expecting X, Y (integer) and Direction (N,S,W,E)');
        }

        if (!self::validateDigit($roverInput)) {
            throw new InvalidArgumentException(sprintf('Input must be Integer, Expected Input (int(X) int(Y)) given %s', implode(' ', $inputArray)));
        }

        return [
            'roverCoordinates' => new Coordinate($roverInput[0], $roverInput[1]),
            'roverPosition' => new Direction($roverInput[2]),
        ];

    }

    /**
     * @param array $input
     * @return bool
     */
    public static function validateDigit(array $input)
    {
        return (ctype_digit($input[1]) && ctype_digit($input[0]));
    }
}
