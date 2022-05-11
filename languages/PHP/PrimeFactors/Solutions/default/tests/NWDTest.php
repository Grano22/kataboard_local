<?php

declare(strict_types=1);


namespace PrimeFactor\Tests;

use PHPUnit\Framework\TestCase;
use Webmozart\Assert\Assert;
use function PrimeFactor\Src\NWD;

final class NWDTest extends TestCase
{
    public function provideBaseNumbers(): iterable
    {
        yield 'Provide two numbers' => [
            [48, 12],
            12
        ];

        yield 'Provide three numbers' => [
            [12, 18, 8],
            4
        ];
    }

    /**
     * @dataProvider provideBaseNumbers
     */
    public function testNwdWillBeCalculatedCorrectly(array $baseNumbers, int $expectedSum): void
    {
        // Arrange

        // Act
        $result = NWD(...$baseNumbers);

        // Assert
        self::assertEquals($expectedSum, $result);
    }
}
