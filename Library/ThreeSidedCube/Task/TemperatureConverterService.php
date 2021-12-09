<?php declare(strict_types=1);

namespace Phpdev\Library\ThreeSidedCube\Task;

final class TemperatureConverterService
    implements TemperatureConverterServiceInterface
{
    private Converters\TemperatureConverterFactory $_factory;

    public function __construct(Converters\TemperatureConverterFactory $factory)
    {
        $this->_factory = $factory;
    }

    public function convert(float $temp, string $unit): string
    {
        $unit = $this->_getMappedUnit($unit);

        $handler = ($this->_factory)($unit);

        $newTemp = $handler->convert($temp);

        $newUnit = $handler->getUnit();

        return "{$newTemp} degree {$newUnit}";
    }

    private function _getMappedUnit(string $unit): string 
    {
        $map = [
            'c' => 'Celcius',
            'f' => 'Fahrenheit',
            'celcius' => 'Celcius',
            'fahrenheit' => 'Fahrenheit',
        ];

        return $map[$unit];
    }
}