<?php
// src/Interface/FileCreatorInterface.php

namespace App\Interface;

interface FileCreatorInterface {
    public function createFile(string $path): void;
}
