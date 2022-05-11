<?php

declare(strict_types=1);


final class KataboardOutputBuilder
{
    private readonly array $outputStack = [];

    public static function create(): self
    {
        return new self();
    }

    private function __construct() {

    }

    public function withDescription(string $newDescription): self
    {
        $this->outputStack[] = $newDescription;

        return $this;
    }

    public function finish(): string
    {
        $outputStr = '';

        foreach ($this->outputStack as $outputEntry) {

        }

        return $outputStr;
    }
}
