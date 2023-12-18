<?php
// src/Service/FileCreationService.php

namespace App\Service;

use App\Interface\FileCreatorInterface;

class FileCreationService {
    private $fileCreators;

    public function __construct(array $fileCreators) {
        $this->fileCreators = $fileCreators;
    }

    public function createFile(string $path, string $type): void {
        foreach ($this->fileCreators as $fileCreator) {
            if ($fileCreator instanceof FileCreatorInterface) {
                $fileCreator->createFile($path);
            }
        }
    }
}
