<?php

namespace App\Service\Element;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsElementPreviewIndexJs implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        if (strpos($path, "$cmsElementTechnicalName/preview/index.js")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $content = "import template from './cms-element-preview-$cmsElementTechnicalName.html.twig';
import './cms-element-preview-$cmsElementTechnicalName.scss'
const {Component}=Shopware;
Component.register(\"sw-cms-el-preview-$cmsElementTechnicalName\", {
    template,
}";
        return $content;
    }
}