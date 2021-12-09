<?php declare(strict_types=1);

namespace Phpdev\Library\ThreeSidedCube\Task\Converters;

final class CelciusToFahrenheitConverter
    implements TemperatureConverterInterface
{
    public function convert(float $temp): float
    {
        return round((($temp * 9/5) + 32), 2);
    }

    public function getUnit(): string 
    {
        return 'Fahrenheit';
    }
}