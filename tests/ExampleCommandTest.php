<?php

declare(strict_types=1);

namespace Tests;

use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleCommandTest extends AbstractTestCase
{
    /**
     * @test
     * @throws \Exception
     */
    public function can_register_command_on_the_fly()
    {
        $this->registerNewCommand("app:hello", function (InputInterface $input, OutputInterface $output) {
            $output->writeln("Hello World");
            return 0;
        });

        $output = $this->call('app:hello', []);

        $this->assertEquals("Hello World\n", $output->fetch());
    }

    /**
     * @test
     */
    public function or_can_call_already_registed_command()
    {
        $output = $this->call('inspiring');

        $this->assertEquals("You have been inspired!\n", $output->fetch());
    }
}
