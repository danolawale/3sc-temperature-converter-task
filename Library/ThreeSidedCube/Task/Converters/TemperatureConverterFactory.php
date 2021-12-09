<?php declare(strict_types=1);

namespace Phpdev\Library\ThreeSidedCube\Task\Converters;

final class TemperatureConverterFactory
{
    public function __invoke(string $unit): TemperatureConverterInterface
    {
        if($unit == 'Celcius')
        {
            return new CelciusToFahrenheitConverter;
        }
        else
        {
            return new FahrenheitToCelciusConverter;
        }
    }
}