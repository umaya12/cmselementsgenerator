<?php
// src/Service/CreateMainJs.php

namespace App\Service\Plugin;

use App\Interface\FileCreatorInterface;

class MainJs implements FileCreatorInterface {


    public function createFile(string $path): void {
        if(strpos($path,'src/main.js')){
            // Logik zum Erstellen einer main.js-Datei
            file_put_contents($path, "// Ihr JavaScript-Code");
        }

    }

    public function getContent(): string
    {
        $content="import './module/sw-cms';";
        return $content;
    }
}
