<?php

declare(strict_types=1);

namespace PHPRunTools\Runner;

use Exception;
use Fiber;
use WeakMap;
use const PHPRunTools\MINIMAL_PHP_VERSION;

final class KataboardFiberRunner implements KataboardRunner
{
    private const MINIMAL_FEATURE_VERSION = '8.1.0';

    private WeakMap $map;
    private int $fiberLastId = 0;

    public function __construct() {
        $this->map = new WeakMap();
    }

    public function run(callable $work): int
    {
        (version_compare(PHP_VERSION, self::MINIMAL_FEATURE_VERSION, '>='))
            or die('Unsupported PHP version, ' . self::MINIMAL_FEATURE_VERSION . ' or higher required');

        $fiber = new Fiber(static function() use ($work): void {
            $work();
        });

        $this->map[$this->fiberLastId] = $fiber;

        return $this->fiberLastId++;
    }

    public function shutdown(): void
    {
        /** @var Fiber $fiber */
        foreach ($this->map->getIterator() as $fiber) {
            if ($fiber->isRunning()) {
                $fiber->throw(new Exception('Work exited immadiely'));
            }
        }
    }
}
