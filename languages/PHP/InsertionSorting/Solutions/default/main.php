<?php

declare(strict_types=1);


function main(): void
{
    $inputArray = [21, 12, 54, 33, 32, 13];
    $sortedByIntersection = IntersectionSort($inputArray);
    echo "Unsorted array\n";
    var_export($inputArray);
    echo "Sorted array\n";
    var_export($sortedByIntersection);
}
