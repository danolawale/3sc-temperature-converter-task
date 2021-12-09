#!/usr/bin/env php

<?php
require __DIR__. '/vendor/autoload.php';

$application = new \Symfony\Component\Console\Application();

$commandFile = __DIR__. '/Library/CliCommand/TemperatureConverterTask.php';

require_once($commandFile);

$factory = new \Phpdev\Library\ThreeSidedCube\Task\Converters\TemperatureConverterFactory();

$service = new \Phpdev\Library\ThreeSidedCube\Task\TemperatureConverterService($factory);

$application->addCommands([ new \Phpdev\Library\CliCommand\TemperatureConverterTask($service) ]);

$application->run();