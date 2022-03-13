<?php


namespace Application\IO;


use Application\Model\Coordinate;
use InvalidArgumentException;

class PlateauInput
{

    /**
     * @param $input
     * @return Coordinate
     */
    public static function input($input)
    {
        $plateauGridData = explode(' ', trim($input));

        if (count($plateauGridData) !== 2) {
            throw new InvalidArgumentException('Expecting X and Y (integer)');
        }

        if (!self::validateDigit($plateauGridData)) {
            throw new InvalidArgumentException(sprintf('Input must be Integer, Expected Input (int(X) int(Y)) given %s', implode(' ', $plateauGridData)));
        }

        return new Coordinate($plateauGridData[0], $plateauGridData[1]);

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
