<?php
// src/Service/CreateMainJs.php

namespace App\Service;

use App\Interface\FileCreatorInterface;

class CreateMainJs implements FileCreatorInterface {
    public function createFile(string $path): void {
        // Logik zum Erstellen einer main.js-Datei
        file_put_contents($path, "// Ihr JavaScript-Code");
    }
}
