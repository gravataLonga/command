<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InspiringCommand extends Command
{
    protected static $defaultName = "inspiring";

    public function __construct()
    {
        parent::__construct(null);
    }

    public function configure()
    {
        $this
            ->setDescription('Inspiring me')
            ->setHelp('This command will be inspire you to create great thing');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("You have been inspired!");
        return 0;
    }
}
