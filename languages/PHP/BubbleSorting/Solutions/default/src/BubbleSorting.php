<?php

declare(strict_types=1);

namespace BubbleSorting\Src;

function bubbleSort(array $inputArray): array {
    $inputArrayCount = count($inputArray);

    for ($index = 0; $index < $inputArrayCount; $index++) {
        $swapped = false;

        for ($innerIndex = 0; $innerIndex < $inputArrayCount - $index - 1; $innerIndex++) {
            if ($inputArray[$innerIndex] < $inputArray[$innerIndex + 1]) {
                $tempValue = $inputArray[$innerIndex];
                $inputArray[$innerIndex] = $inputArray[$innerIndex + 1];
                $inputArray[$innerIndex + 1] = $tempValue;
                $swapped = true;
            }
        }

        if (!$swapped) {
            break;
        }
    }

    return $inputArray;
}