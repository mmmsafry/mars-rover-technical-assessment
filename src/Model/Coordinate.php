<?php


namespace Application\Model;


class Coordinate
{
    /**
     * @var int
     */
    private $xAxis;
    /**
     * @var int
     */
    private $yAxis;

    /**
     * @return int
     */
    public function getX()
    {
        return $this->xAxis;
    }


    /**
     * @return int
     */
    public function getY()
    {
        return $this->yAxis;
    }

    /**
     * Coordinate constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->xAxis = (int)$x;
        $this->yAxis = (int)$y;
    }
}
