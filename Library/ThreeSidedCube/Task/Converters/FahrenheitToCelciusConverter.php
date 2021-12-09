<?php declare(strict_types=1);

namespace Phpdev\Library\ThreeSidedCube\Task\Converters;

final class FahrenheitToCelciusConverter
    implements TemperatureConverterInterface
{
    public function convert(float $temp): float
    {
        return round((($temp - 32) * 5/9), 2);
    }

    public function getUnit(): string 
    {
        return 'Celcius';
    }
}