<?php

namespace App\Service\Element;

use App\Interface\FileCreatorInterface;
use App\Service\Element\SwComponents\ComponentsFactory;
use App\Service\FormDataManager;

class CmsElementIndexJs implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
        private ComponentsFactory $componentsFactory
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        if (strpos($path, "$cmsElementTechnicalName/index.js")) {
            file_put_contents($path, $this->getContent());
        }
    }
    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $fieldsData = $this->cmsFormDataManager->getCmsFieldsData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $defaultConfig = $this->componentsFactory->defaultConfigGenerator($fieldsData);
        return "import './component';
import './config';
import './preview';
Shopware.Service('cmsService').registerCmsElement({
    name: '$cmsElementTechnicalName',
    label: 'ap.cms.elements.ImageText.label',
    component: 'sw-cms-el-component-$cmsElementTechnicalName',
    configComponent: 'sw-cms-el-config-$cmsElementTechnicalName',
    previewComponent: 'sw-cms-el-preview-$cmsElementTechnicalName',
    defaultConfig:{ {$defaultConfig}
}});";
    }


}