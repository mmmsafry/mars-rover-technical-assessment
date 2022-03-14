<?php


namespace Application\Model;

use Application\Control\Command;
use Application\Control\Inputs;
use Application\Control\MoveHead;
use Application\Control\SpinLeft;
use Application\Control\SpinRight;

class CommandFactory
{
    /**
     * @param $commandType
     * @return Command
     * @throws \Exception
     */
    public function createCommand($commandType)
    {
        switch ($commandType) {
            case Inputs::MOVE;
                return new MoveHead();
            case Inputs::TURN_RIGHT:
                return new SpinRight();
            case Inputs::TURN_LEFT:
                return new SpinLeft();
            default:
                throw new \Exception("'" . $commandType . "' Invalid Input given");
        }
    }
}
