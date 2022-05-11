<?php

declare(strict_types=1);

namespace QuickSort\Src;

function swap(array &$array, int $firstIndex, int $secondIndex): void {
    $tmp = $array[$firstIndex];
    $array[$firstIndex] = $array[$secondIndex];
    $array[$secondIndex] = $tmp;
}
