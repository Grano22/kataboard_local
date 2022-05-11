<?php

namespace PHPRunTools;

interface KataboardLocalLoader
{
    public function register(string $path): void;
}