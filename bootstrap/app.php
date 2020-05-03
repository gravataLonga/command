<?php

use Gravatalonga\Console\ListCommand;
use Gravatalonga\Container\Container;
use Symfony\Component\Console\Application;

if (!$container = Container::getInstance()) {
    $container = new Container();
}

$dependencies = require __DIR__ . "/../dependencies.php";

foreach ($dependencies as $depend => $factory) {
    $container->set($depend, $factory);
}

$app = new Application($container->has('name') ?: 'Application', $container->has('version') ?: "1.0.0");

$list = ListCommand::get(__DIR__ . '/../Commands');
foreach ($list as $command) {
    $app->add($container->get($command));
}

return $app;
