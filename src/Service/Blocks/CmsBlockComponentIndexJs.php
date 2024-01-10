<?php

namespace App\Service\Blocks;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsBlockComponentIndexJs implements FileCreatorInterface
{
    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        $cmsBlocksCategory = $formData["cmsBlocksCategory"];
        if (strpos($path, "$cmsBlocksCategory/$cmsBlocksTechnicalName/component/index.js")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        $content = "import template from './cms-block-component-$cmsBlocksTechnicalName.html.twig';
import './cms-block-component-$cmsBlocksTechnicalName.scss'
const {Component}=Shopware;
Component.register(\"sw-cms-block-$cmsBlocksTechnicalName\", {
template,
})";
        return $content;
    }
}