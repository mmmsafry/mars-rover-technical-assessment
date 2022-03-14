<?php


namespace Application\Model;


use Application\Control\CommandsCollection;

class CommandsInputParser
{
    /**
     * @var CommandsCollection
     */
    private $commands;

    /**
     * @return CommandsCollection
     */
    public function getCommandsCollection()
    {
        return $this->commands;
    }

    /**
     * CommandsInputParser constructor.
     * @param string $commandsInput
     * @throws \Exception
     */
    public function __construct($commandsInput)
    {

        $CommandFactory = new CommandFactory();
        $this->commands = new CommandsCollection();

        $commands = str_split(trim($commandsInput));
        foreach ($commands as $commandType) {
            $this->commands->append(
                $CommandFactory->createCommand($commandType)
            );
        }
    }
}
