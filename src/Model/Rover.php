<?php


namespace Application\Model;


use Application\Control\CommandsCollection;

class Rover extends \ArrayObject
{

    /**
     * @var RoverSetup
     */
    private $Setup;

    /**
     * @return RoverSetup
     */
    public function getSetup()
    {
        return $this->Setup;
    }

    /**
     * @var CommandsCollection
     */
    private $Commands;

    /**
     * @param CommandsCollection $Commands
     */
    public function setCommands(CommandsCollection $Commands)
    {
        $this->Commands = $Commands;
    }

    /**
     * @param RoverSetup $RoverSetup
     */
    public function setSetup(RoverSetup $RoverSetup)
    {
        $this->Setup = $RoverSetup;
    }

    public function execute()
    {
        $Iterator = $this->Commands->getIterator();

        $Iterator->rewind();

        while ($Iterator->valid()) {
            $Command = $Iterator->current();
            $Command->execute($this);
            $Iterator->next();
        }
    }

    /**
     * @return string
     */
    public function getSetupAsString()
    {
        return $this->Setup->toString();
    }
}
