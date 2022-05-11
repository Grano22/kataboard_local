<?php

declare(strict_types=1);

use function BubbleSorting\Src\bubbleSort;

function main(): void
{
    $sortedArray = bubbleSort([1, 25, 32, 11, 7]);
    var_export($sortedArray);
}
