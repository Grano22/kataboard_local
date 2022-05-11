<?php

declare(strict_types=1);


namespace PrimeFactor\Tests;

use PHPUnit\Framework\TestCase;
use function PrimeFactor\Src\NWW;

final class NWWTest extends TestCase
{
    public function provideBaseNumbers(): iterable
    {
        yield 'Provide two numbers' => [
            [48, 12],
            48
        ];

        yield 'Provide three numbers' => [
            [12, 18, 8],
            72
        ];
    }

    /**
     * @dataProvider provideBaseNumbers
     */
    public function testNwwWillBeCalculatedCorrectly(array $baseNumbers, int $expectedSum): void
    {
        // Arrange


        // Act
        $result = NWW(...$baseNumbers);

        // Assert
        self::assertEquals($expectedSum, $result);
    }
}
