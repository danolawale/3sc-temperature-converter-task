<?php declare(strict_types=1);

namespace Phpdev\Library\ThreeSidedCube\Task\Converters;

interface TemperatureConverterInterface
{
    public function convert(float $temp): float;

    public function getUnit(): string;
}