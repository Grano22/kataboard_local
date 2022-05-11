<?php

declare(strict_types=1);

function IntersectionSort(array $array, int $howMuch = 0): array
{
    if (!$howMuch) {
        $howMuch = count($array);
    }

    if ($howMuch > count($array)) {
        throw new LogicException('Iteration max size overflow');
    }

    for ($index = 0; $index < $howMuch; $index++) {
        $key = $array[$index];
        $subIndex = $index - 1;

        while ($subIndex >= 0 && $array[$subIndex] > $key) {
            $array[$subIndex + 1] = $array[$subIndex];
            $subIndex -= 1;
        }

        $array[$subIndex + 1] = $key;
    }

    return $array;
}
