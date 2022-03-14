<?php


namespace Application\Model;


class Plateau
{

    /**
     * @var Coordinate
     */
    private $minGrid;
    /**
     * @var Coordinate
     */
    private $maxGrid;


    /**
     * @return mixed
     */
    public function getMinGrid()
    {
        return $this->minGrid;
    }


    /**
     * @return Coordinate
     */
    public function getMaxGrid()
    {
        return $this->maxGrid;
    }

    /**
     * Plateau constructor.
     * @param Coordinate $MaxGridInput
     */
    public function __construct(Coordinate $MaxGridInput)
    {
        $this->minGrid = new Coordinate(0, 0); // lower-left coordinates are assumed to be 0,0
        $this->maxGrid = $MaxGridInput; // upper-right coordinates (first Input)
    }
}
