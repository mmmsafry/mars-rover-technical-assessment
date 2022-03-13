<?php


namespace Application\IO;


use Application\Model\Coordinate;
use InvalidArgumentException;

class Input
{

    /**
     * @param $input
     * @return Coordinate
     */
    public static function plateauInput($input)
    {
        $plateauBorders = explode(' ', trim($input));

        if (count($plateauBorders) !== 2) {
            throw new InvalidArgumentException('Expecting X and Y (integer)');
        }

        if (!self::validateDigit($plateauBorders)) {
            throw new InvalidArgumentException(sprintf('Input must be Integer, Expected Input (int(X) int(Y)) given %s', implode(' ', $inputArray)));
        }

        return new Coordinate($plateauBorders[0], $plateauBorders[1]);

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
