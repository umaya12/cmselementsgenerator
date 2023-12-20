<?php

namespace App\Service;

use App\Interface\FileCreatorInterface;

class CreateTwigDatei implements FileCreatorInterface
{

    public function createFile(string $path): void
    {
        if(strpos($path, "html.twig")){
            file_put_contents($path, "// Ihr TWIGGGGGGG");

        }

    }

}