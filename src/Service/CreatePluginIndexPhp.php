<?php

namespace App\Service;

use App\Interface\FileCreatorInterface;

class CreatePluginIndexPhp implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $pluginTechnicalName = $formData['pluginTechnicalName'];
         if (strpos($path, "$pluginTechnicalName.php")) {
            if (!file_exists($path)) {
                file_put_contents($path, $this->getContent($pluginTechnicalName));
            }
        }
    }

    public function getContent($pluginTechnicalName)
    {
        $content =
            " <?php declare(strict_types=1);
        
        namespace $pluginTechnicalName;
        
        use Shopware\Core\Framework\Plugin;
        
        class $pluginTechnicalName extends Plugin
        {
        
        }   
    ";
        return $content;
    }

}