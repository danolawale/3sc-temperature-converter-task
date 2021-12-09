<?php declare(strict_types=1);

namespace Phpdev\Library\ThreeSidedCube\Task;

interface TemperatureConverterServiceInterface
{
    public function convert(float $temp, string $unit): string;
}