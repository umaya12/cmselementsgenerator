<?php
namespace App\Service\Plugin;


use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class ConfigServicesXml implements FileCreatorInterface{


    public function createFile(string $path): void
    {
         if (strpos($path, "config/services.xml")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $content =
<<<'EOT'
<?xml version="1.0" ?>

<container xmlns="http://symfony.com/schema/dic/services"
           xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
           xsi:schemaLocation="http://symfony.com/schema/dic/services http://symfony.com/schema/dic/services/services-1.0.xsd">

    <services>
    </services>
</container> 
EOT;
        return $content;
    }
}