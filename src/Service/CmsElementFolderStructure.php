<?php
namespace App\Service;

class CmsElementFolderStructure{
    private $outputFolder;

    public function __construct(string $output_folder)
    {
        $this->outputFolder = $output_folder;
    }

    public function mainStructure():array{


        $cmsElementName="Hallo";
        $structure = [
            "$this->outputFolder/src/Resources/views/storefront/element/cms-element-$cmsElementName.html.twig",
            "$this->outputFolder/src/Resources/app/administration/src/main.js",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/snippet/de-DE.json",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/snippet/en-GB.json",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/index.js",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/preview/index.js",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/preview/sw-cms-el-preview-$cmsElementName.html.twig",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/preview/sw-cms-el-preview-$cmsElementName.scss",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/elements/index.js",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/elements/sw-cms-el-$cmsElementName.html.twig",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/elements/sw-cms-el-$cmsElementName.scss",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/block/$cmsElementName/config/sw-cms-block-config-$cmsElementName.html.twig",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/config/index.js",
            "$this->outputFolder/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/config/sw-cms-el-config-$cmsElementName.html.twig",
        ];
        return $structure;

    }


}