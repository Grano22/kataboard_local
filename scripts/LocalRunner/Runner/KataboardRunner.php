<?php

declare(strict_types=1);

namespace PHPRunTools\Runner;

interface KataboardRunner
{
    public function run(callable $work): int;
    public function shutdown(): void;
}