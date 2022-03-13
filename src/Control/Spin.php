<?php

namespace Application\Control;

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
     * Spin constructor.
     * @param $input
     */
    public function __construct($input)
    {
        if (!in_array($input, [self::LEFT, self::RIGHT])) {
            throw new InvalidArgumentException(
                sprintf("Invalid spinning, following directions only available %s", $input, implode([self::LEFT, self::RIGHT]))
            );
        }

        $this->spin = $input;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->spin;
    }

}
