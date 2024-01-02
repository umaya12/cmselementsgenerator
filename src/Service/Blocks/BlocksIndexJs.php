<?php

namespace  App\Service\Blocks;


use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class BlocksIndexJs implements FileCreatorInterface{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        if (strpos($path, "sw-cms/blocks/index.js")) {
            file_put_contents($path, $this->getContent());
        }

    }

    public function getContent(): string
    {
        // TODO: Implement getContent() method.
        return "";
    }
}