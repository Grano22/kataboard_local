<?php

declare(strict_types=1);

namespace PrimeFactor\Tests;

use function PrimeFactor\Src\PrimeFactors;
use PHPUnit\Framework\TestCase;

final class PrimaryFactorTest extends TestCase
{
    public function testPrimaryFactorWillSupportOnlyEvenNumbers(): void
    {
        // Arrange
        $baseNumber = 16;

        // Act
        $primeParts = PrimeFactors($baseNumber);

        // Assert
        self::assertEquals([2, 2, 2, 2, 1], $primeParts);
    }

    public function testPrimaryFactorWillSupportOnlyOddNumbers(): void
    {
        // Arrange
        $baseNumber = 495;

        // Act
        $primeParts = PrimeFactors($baseNumber);

        // Assert
        self::assertEquals([3, 3, 5, 11], $primeParts);
    }

    public function testPrimaryFactorWillSupportMixedNumberWithLastSignificant(): void
    {
        // Arrange
        $baseNumber = 1;

        // Act
        $primeParts = PrimeFactors($baseNumber);

        // Assert
        self::assertEquals([1], $primeParts);
    }
}
