<?php declare(strict_types=1);

namespace Tests\Library\ThreeSidedCube\Task;

use \Phpdev\Library\ThreeSidedCube\Task\TemperatureConverterService;
use \Phpdev\Library\ThreeSidedCube\Task\Converters\TemperatureConverterFactory;

final class TemperatureConverterServiceTest
    extends \PHPUnit\Framework\TestCase
{
   /**
    * @dataProvider dataProvider
    */
    public function test(float $temp, string $unit, string $expected): void
    {
        $converterFactory = new TemperatureConverterFactory;
        $service = new TemperatureConverterService($converterFactory);

        $result = $service->convert($temp, $unit);

        $this->assertEquals($expected, $result);
    }

    public function dataProvider(): array
    {
        return [
            [
                40, 'c', '104 degree Fahrenheit'
            ],
            [
                45, 'celcius', '113 degree Fahrenheit'
            ],
            [
                70, 'f', '21.11 degree Celcius'
            ],
            [
                75, 'fahrenheit', '23.89 degree Celcius'
            ]
        ];
    }
}