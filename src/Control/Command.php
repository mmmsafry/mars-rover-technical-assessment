<?php


namespace Application\Control;


use Application\Model\Rover;

interface Command
{
    public function execute(Rover $Rover);
}
