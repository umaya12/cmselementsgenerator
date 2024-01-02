<?php

namespace App\Service\Element;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsElementComponentIndexJs implements FileCreatorInterface
{
    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        if (strpos($path, "sw-cms/elements/$cmsElementTechnicalName/component/index.js")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $content = "import template from './cms-element-component-$cmsElementTechnicalName.html.twig';
import './cms-element-component-$cmsElementTechnicalName.scss'
const {Component}=Shopware;
Component.register(\"sw-cms-el-component-$cmsElementTechnicalName\", {
    template,
}";
        return $content;
    }
}