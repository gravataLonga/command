<?php

namespace Tests;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\OutputInterface;
use \PHPUnit\Framework\TestCase as BaseTestCase;

abstract class AbstractTestCase extends BaseTestCase
{
    /**
     * @var Application
     */
    protected $app;

    public function setUp(): void
    {
        $this->app = require __DIR__ . "/../bootstrap/app.php";
        $this->app->setAutoExit(false);
    }

    public function call(string $command, array $arguments = [])
    {
        $output = new BufferedOutput();
        $this->app->run(new ArrayInput(array_merge(['command' => $command], $arguments)), $output);
        return $output;
    }

    public function registerNewCommand(string $name, \Closure $callback)
    {
        $command = new class($name, $callback) extends Command {
            protected $callback;

            public function __construct(string $name = null, \Closure $callback = null)
            {
                parent::__construct($name);
                $this->callback = $callback;
            }

            public function execute(InputInterface $input, OutputInterface $output)
            {
                $call = $this->callback;
                return $call($input, $output);
            }
        };
        $command->setName($name);

        $this->app->add($command);
    }
}
