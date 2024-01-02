<?php
namespace App\Service\Plugin;


use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class ConfigPluginLogo implements FileCreatorInterface{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        if (strpos($path, "plugin.png")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        // TODO: Implement getContent() method.
        return "";
    }
}