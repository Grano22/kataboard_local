<?php

declare(strict_types=1);

namespace PHPRunTools\Loader;

use PHPRunTools\KataboardLocalLoader;
use RuntimeException;

final class KataboardLocalAutoloader implements KataboardLocalLoader
{
    public function register(string $path): void
    {
        spl_autoload_register(static function (string $className) use ($path) {
            $postContext = strrpos($className, '\\src');
            $contextDir = 'src';

            var_dump($className);

            if($postContext === false) {
                $postContext = strrpos($className, '\\tests');

                if ($postContext === false) {
                    throw new RuntimeException('Namespace context is invalid');
                }

                $contextDir = 'tests';
            }

            $fileName =
                sprintf(
                    "%s%s%s%s%s.php",
                    basename($path),
                    DIRECTORY_SEPARATOR,
                    substr($contextDir, $postContext),
                    DIRECTORY_SEPARATOR,
                    str_replace("\\", "/", $className)
                );

            if (!is_file($fileName)) {
                throw new RuntimeException('Class ' . $className . ' not found');
            }
        });
    }
}
