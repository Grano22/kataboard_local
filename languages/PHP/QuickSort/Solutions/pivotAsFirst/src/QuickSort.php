<?php

declare(strict_types=1);

namespace QuickSort\Src;

use LogicException;

/**
 * @FunFact
 * @Chellenges
 */
function QuickSort(array &$array, int $lowestIndex, int $largestIndex): void {
    var_dump($lowestIndex);
    var_dump($largestIndex);

    if ($lowestIndex >= $largestIndex || $lowestIndex < 0) {
        return;
    }

    $partitioned = Paritionate($array, $lowestIndex, $largestIndex);

    QuickSort($array, $lowestIndex, $partitioned - 1);
    QuickSort($array, $partitioned + 1, $largestIndex);
}
