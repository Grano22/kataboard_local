<?php

declare(strict_types=1);

namespace Shared\Helpers;

final class ArrayUtils
{
    public static function subtract(array ...$arrays): array
    {
        $baseArray = $arrays[0];

        for ($arrayIndex = 1; $arrayIndex < count($arrays); $arrayIndex++) {
            $array = $arrays[$arrayIndex];

            foreach ($array as $item) {
                $key = array_search($item, $baseArray);
                if ($key !== false) {
                    unset($baseArray[$key]);
                }
            }
        }

        return $baseArray;
    }
}
