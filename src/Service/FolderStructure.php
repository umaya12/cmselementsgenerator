<?php

namespace App\Service;

class FolderStructure
{
    private $outputFolder;
    private FormDataManager $cmsFormDataManager;
    private array $cmsElementStructure = [];

    public function __construct(
        string $output_folder,
        FormDataManager $cmsFormDataManager
    ) {
        $this->cmsFormDataManager = $cmsFormDataManager;
        $this->outputFolder = $output_folder;
    }

    public function generateCmsElementStructure()
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $pluginTechnicalName = $formData['pluginTechnicalName'];
        $cmsTechnicalName = $formData['cmsTechnicalName'];
        $structure = [
            "$this->outputFolder/$pluginTechnicalName/src/Resources/views/storefront/element/cms-element-$cmsTechnicalName.html.twig",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/main.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/snippet/de-DE.json",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/snippet/en-GB.json",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsTechnicalName/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsTechnicalName/preview/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsTechnicalName/preview/sw-cms-el-preview-$cmsTechnicalName.html.twig",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsTechnicalName/preview/sw-cms-el-preview-$cmsTechnicalName.scss",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsTechnicalName/elements/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsTechnicalName/elements/sw-cms-el-$cmsTechnicalName.html.twig",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsTechnicalName/elements/sw-cms-el-$cmsTechnicalName.scss",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/block/$cmsTechnicalName/config/sw-cms-block-config-$cmsTechnicalName.html.twig",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsTechnicalName/config/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsTechnicalName/config/sw-cms-el-config-$cmsTechnicalName.html.twig",
        ];
        $this->cmsElementStructure = $structure;
    }

    public function getCmsElementStructure(): array
    {
        $this->generateCmsElementStructure();
        return $this->cmsElementStructure;
    }

}