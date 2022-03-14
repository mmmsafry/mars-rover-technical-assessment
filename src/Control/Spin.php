<?php


namespace Application\Control;


abstract class Spin
{
    /**
     * @param $currentDirection
     * @return string
     */
    abstract protected function rotateFrom($currentDirection);
}
