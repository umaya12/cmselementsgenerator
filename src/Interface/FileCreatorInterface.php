<?php

namespace App\Interface;

interface FileCreatorInterface {
    public function createFile(string $path): void;
    public function getContent():string;
}
