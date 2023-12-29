<?php

namespace App\Service\Blocks;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsBlockPreviewIndexJs implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        if (strpos($path, "$cmsBlocksTechnicalName/preview/index.js")) {
            file_put_contents($path, $this->getContent());
        }
        // TODO: Implement createFile() method.
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        $content = "import template from './cms-block-preview-$cmsBlocksTechnicalName.html.twig';
import './cms-block-preview-$cmsBlocksTechnicalName.scss'
const {Component}=Shopware;
Component.register(\"sw-cms-preview-$cmsBlocksTechnicalName\",{
    template
})";
        return $content;
    }
}