<?php


namespace Application\Model;


class RoverSquad extends \ArrayObject
{

    public function execute()
    {
        $Iterator = $this->getIterator();
        $Iterator->rewind();

        while ($Iterator->valid()) {
            $Rover = $Iterator->current();
            $Rover->execute();
            $Iterator->next();
        }
    }

    /**
     * @return string
     */
    public function getRoversSetupAsString()
    {
        $Iterator = $this->getIterator();
        $Iterator->rewind();

        $setup = [];
        while ($Iterator->valid()) {
            $Rover = $Iterator->current();
            $setup[] = $Rover->getSetupAsString();
            $Iterator->next();
        }

        return implode("\n", $setup);
    }


}
