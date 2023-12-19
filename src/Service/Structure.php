<?php
namespace App\Service;

class Structure{

    public function createStructure(){

        $rootPath = $this->output_folder;
        dump($rootPath);
        exit;
        $cmsElementName="Hallo";
        $structure = [
            "$rootPath/src/Resources/views/storefront/element/cms-element-$cmsElementName.html.twig",
            "$rootPath/src/Resources/app/administration/src/main.js",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/snippet/de-DE.json",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/snippet/en-GB.json",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/index.js",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/preview/index.js",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/preview/sw-cms-el-preview-$cmsElementName.html.twig",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/preview/sw-cms-el-preview-$cmsElementName.scss",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/elements/index.js",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/elements/sw-cms-el-$cmsElementName.html.twig",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/elements/sw-cms-el-$cmsElementName.scss",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/block/$cmsElementName/config/sw-cms-block-config-$cmsElementName.html.twig",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/config/index.js",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/config/sw-cms-el-config-$cmsElementName.html.twig",
        ];

    }


}