<?php
/**
 * @package Kataboard
 * @author Grano22 Dev
 */

namespace PHPRunTools;

use PHPRunTools\Resolver\KataboardWorkspaceResolver;
use RuntimeException;
use Throwable;

const MINIMAL_PHP_VERSION = '8.0.0';

(php_sapi_name() === "cli") or die('This script requires CLI environment');

(version_compare(PHP_VERSION, MINIMAL_PHP_VERSION, '>='))
    or die('Unsupported PHP version, ' . MINIMAL_PHP_VERSION . ' or higher required');

include "Loader/KataboardLocalLoader.php";
include "Loader/KataboardLocalRecursivePathLoader.php";
include "Resolver/KataboardWorkspaceResolver.php";

final class KataboardLocalRunner {
    const FLAG_DEBUG_MODE = 0b0001;

    private int $flags;
    private string $basePath;
    private string $workplacePath;
    private string $targetScriptPath;
    private string $solutionPath;
    private float $lastExecutionEndTime = -1;
    public KataboardLocalLoader $localLoader;

    private KataboardWorkspaceResolver $workspaceResolver;

    public function __construct(int $flags = 0) {
        $this->workspaceResolver = new KataboardWorkspaceResolver();
        $this->localLoader = new KataboardLocalRecursivePathLoader();
        $this->flags = $flags;

        register_shutdown_function(function () {

        });
    }

    public function getLastExecutionEndTime(): float
    {
        return $this->lastExecutionEndTime;
    }

    public function findWorkplaceByName(string $workplaceName, string $basePath): void
    {
        $this->basePath = $basePath;
        $this->workplacePath = $this->workspaceResolver->findWorkplaceByName($workplaceName, $basePath);
    }

    public function findWorkplaceSolutionByName(?string $solution = null): void
    {
        if ($solution === null) {
            $solutionsDirs = $this->workspaceResolver->getAvailableSolutions($this->workplacePath);

            if (count($solutionsDirs) === 0) {
                throw new RuntimeException('No solutions detetected');
            }

            $solution = $solutionsDirs[0];
        }

        $this->solutionPath = $this->workplacePath . DIRECTORY_SEPARATOR . $solution  . DIRECTORY_SEPARATOR;

        if (!is_dir($this->solutionPath)) {
            throw new RuntimeException("Solutions directory `{$this->solutionPath}` do not exists");
        }

        $scriptPath = $this->solutionPath . 'main.php';

        if (!is_file($scriptPath)) {
            throw new RuntimeException("Main script not found in `$scriptPath`");
        }

        $this->targetScriptPath = $scriptPath;
    }

    public function run(): void
    {
        if ($this->isInDebugMode()) {
            echo "Running in debug mode\nPHP Version: " . PHP_VERSION . "\n";
        }

        $this->localLoader->register($this->basePath . 'Shared' . DIRECTORY_SEPARATOR);
        $this->localLoader->register($this->solutionPath . 'src' . DIRECTORY_SEPARATOR);

        try {
            (include_once $this->targetScriptPath) or die('Invalid script from path: ' . $this->targetScriptPath);
            //spl_autoload_call($this->targetScriptPath);
            if (!function_exists('main')) {
                throw new RuntimeException('Function main must be defined without namespace');
            }
            $executionStartTime = microtime(true);
            echo "Output:\n";
            main();
            $this->lastExecutionEndTime = microtime(true) - $executionStartTime;
            echo "\nExecution time:" . round($this->lastExecutionEndTime, 2) . "\n";
        } catch(Throwable $error) {
            echo $error->getMessage();
        }
    }

    private function isInDebugMode(): bool
    {
        return $this->flags & self::FLAG_DEBUG_MODE;
    }
}

$consoleOptions = getopt('w:s::p::');

if (!array_key_exists('w', $consoleOptions)) {
    throw new RuntimeException('Workplace is not set');
}

$flags = 0;

if ($_SERVER['debug'] ??= true) {
    $flags |= KataboardLocalRunner::FLAG_DEBUG_MODE;
}

$kataboardRunner = new KataboardLocalRunner($flags);

$kataboardRunner->findWorkplaceByName(
    $consoleOptions['w'],
    $consoleOptions['p'] ?? __DIR__ . '/../../languages/PHP/'
);

$kataboardRunner->findWorkplaceSolutionByName($consoleOptions['s'] ?? null);
$kataboardRunner->run();
