<?php
/**
 * @package Kataboard
 * @author Grano22 Dev
 */

namespace PHPRunTools;

use RuntimeException;

const MINIMAL_PHP_VERSION = '8.0.0';

(php_sapi_name() === "cli") or die('This script requires CLI environment');

(version_compare(PHP_VERSION, MINIMAL_PHP_VERSION, '>='))
    or die('Unsupported PHP version, ' . MINIMAL_PHP_VERSION . ' or higher required');

function startKata(string $workplaceName): void {
    $startTimer = hrtime(true);

    $endTimer = hrtime(true);
}

$consoleOptions = getopt('w:s::p::');

if (!array_key_exists('w', $consoleOptions)) {
    throw new RuntimeException('Workplace is not set');
}

startKata($consoleOptions['w']);