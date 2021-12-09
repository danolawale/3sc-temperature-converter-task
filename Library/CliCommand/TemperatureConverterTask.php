<?php declare(strict_types=1);

namespace Phpdev\Library\CliCommand;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\{InputInterface, InputArgument, InputOption};
use Symfony\Component\Console\Output\OutputInterface;

use \Phpdev\Library\ThreeSidedCube\Task\TemperatureConverterServiceInterface;

final class TemperatureConverterTask
	extends Command
{
	private TemperatureConverterServiceInterface $_service;
	
	protected static $defaultName = '3sc:temp:converter';

	public function __construct(
		TemperatureConverterServiceInterface $service)
	{
		$this->_service = $service;
		
		parent::__construct(static::$defaultName);
	}

	protected function configure(): void
    {
		$this
			->setName('3sc:temp:converter')
			->setHelp('This command runs a temperature converter service. Converts temperature from Fahrenheit to Celcius and vice versa')
			->setDescription('This should tempetaure in celcius of the temp specified is in fahrenheit and vice versa')
			->addOption('temp', 't', InputOption::VALUE_REQUIRED)
			->addOption('unit', 'u', InputOption::VALUE_REQUIRED);
    }
	
	protected function execute(InputInterface $input, OutputInterface $output): int
    {
		if(!$input->getOption('temp'))
		{
			$output->writeln("Please specify the temperature. This should be a number");
			
			return Command::FAILURE;
		}

		if(!$input->getOption('unit'))
		{
			$output->writeln("Please specify the temperature in either celcius or fahrenheit.");
			$output->writeln("Enter 'c' or 'celcius if temperature is in celcius; Enter 'f' or 'fahrenheit' if in Fahrenheit");
			
			return Command::FAILURE;
		}
		
		$temperature = $input->getOption('temp');

		$unit = strtolower($input->getOption('unit'));

		if(!is_numeric($temperature))
		{
			$output->writeln("Temperature should be a number");
			
			return Command::FAILURE;
		}

		if(!in_array($unit, ['f','c', 'celcius', 'fahrenheit']))
		{
			$output->writeln("Temperature must be specified in either celcius or fahrenheit");
			$output->writeln("Enter 'c' or 'celcius if temperature is in celcius; Enter 'f' or 'fahrenheit' if in Fahrenheit");
			
			return Command::FAILURE;
		}

		$convertedTemp = $this->_service->convert((float)$temperature, $unit);

		$output->writeln("{$temperature} in degree {$unit} is {$convertedTemp}");
		
		return Command::SUCCESS;
    }
}
