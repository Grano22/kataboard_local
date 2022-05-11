<?php

declare(strict_types=1);


namespace PHPRunTools;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;
use SplFileInfo;

final class KataboardLocalRecursivePathLoader implements KataboardLocalLoader
{

    public function register(string $path): void
    {
        if (!is_dir($path)) {
            throw new RuntimeException('Cannot register directory modules because path ' . $path . ' is invalid');
        }

        $kataboardDirectories = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($path)
        );

        /** @var SplFileInfo $kataboardDirectory */
        foreach ($kataboardDirectories as $kataboardDirectory) {
            if ($kataboardDirectory->isFile() && $kataboardDirectory->getExtension() === 'php') {
                include_once $kataboardDirectory->getPath() . DIRECTORY_SEPARATOR . $kataboardDirectory->getBasename();
            }
        }

    }
}
