<?php
declare (strict_types=1);

namespace App\Service;

interface FileReaderInterface
{
    public function readFile(string $path): string;
}
