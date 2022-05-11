<?php

declare(strict_types=1);

namespace PHPRunTools\Resolver;

use RuntimeException;

final class KataboardWorkspaceResolver
{
    public function findWorkplaceByName(string $workplaceName, string $basePath): string
    {
        $workplaceDir = $basePath . $workplaceName . DIRECTORY_SEPARATOR . 'Solutions';

        if (!is_dir($workplaceDir)) {
            throw new RuntimeException("Workplace directory `$workplaceDir` do not exists");
        }

        return $workplaceDir;
    }

    public function getAvailableSolutions(string $workplacePath): array
    {
        $solutionsDirs = array_filter(glob($workplacePath . DIRECTORY_SEPARATOR . '*'), 'is_dir');

        return array_map(static fn (string $solutionFullPath) => strrchr($solutionFullPath, '/'), $solutionsDirs);
    }
}
