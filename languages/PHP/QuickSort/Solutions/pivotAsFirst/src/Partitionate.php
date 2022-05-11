<?php

declare(strict_types=1);

namespace QuickSort\Src;

function Paritionate(array &$array, int $lowestIndex, int $largestIndex): int {
    $pivot = $array[$largestIndex];
    $baseIndex = $lowestIndex - 1;

    for ($iteriationIndex = $lowestIndex; $iteriationIndex <= $largestIndex - 1; $iteriationIndex++) {
        if ($array[$iteriationIndex] < $pivot) {
            $baseIndex++;

            swap($array, $baseIndex, $iteriationIndex);
        }
    }

    swap($array, $baseIndex + 1, $largestIndex);

    return $baseIndex + 1;
}
