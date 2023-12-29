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
        $cmsElementTechnicalName = $formData['cmsElementTechnicalName'];
        $cmsBlocksTechnicalName = $formData['cmsBlocksTechnicalName'];
        $cmsBlocksCategory = $formData['cmsBlocksCategory'];
        $structure = [
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/$cmsBlocksCategory/$cmsBlocksTechnicalName/component/cms-block-component-$cmsBlocksTechnicalName.html.twig",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/$cmsBlocksCategory/$cmsBlocksTechnicalName/component/cms-block-component-$cmsBlocksTechnicalName.scss",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/$cmsBlocksCategory/$cmsBlocksTechnicalName/component/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/$cmsBlocksCategory/$cmsBlocksTechnicalName/preview/cms-block-preview-$cmsBlocksTechnicalName.html.twig",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/$cmsBlocksCategory/$cmsBlocksTechnicalName/preview/cms-block-preview-$cmsBlocksTechnicalName.scss",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/$cmsBlocksCategory/$cmsBlocksTechnicalName/preview/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/$cmsBlocksCategory/$cmsBlocksTechnicalName/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/$cmsBlocksCategory/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/component/cms-element-component-$cmsElementTechnicalName.html.twig",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/component/cms-element-component-$cmsElementTechnicalName.scss",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/component/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/config/cms-element-config-$cmsElementTechnicalName.html.twig",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/config/cms-element-config-$cmsElementTechnicalName.scss",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/config/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/preview/cms-element-preview-$cmsElementTechnicalName.html.twig",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/preview/cms-element-preview-$cmsElementTechnicalName.scss",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/preview/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/snippet/de-DE.json",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/snippet/en-GB.json",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/index.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/main.js",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/storefront/src/scss/component/_$cmsElementTechnicalName.scss",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/app/storefront/src/scss/base.scss",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/config/plugin.png",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/config/services.xml",
//            "$this->outputFolder/$pluginTechnicalName/src/Resources/public/administration/js/$cmsElementTechnicalName.js",
//            "$this->outputFolder/$pluginTechnicalName/src/Resources/public/administration/css/$cmsElementTechnicalName.css",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/views/storefront/element/cms-element-$cmsElementTechnicalName.html.twig",
            "$this->outputFolder/$pluginTechnicalName/src/Resources/views/storefront/block/cms-block-$cmsBlocksTechnicalName.html.twig",
            "$this->outputFolder/$pluginTechnicalName/src/$pluginTechnicalName.php",
            "$this->outputFolder/$pluginTechnicalName/composer.json"
        ];
        $this->cmsElementStructure = $structure;
    }

    public function getCmsElementStructure(): array
    {
        $this->generateCmsElementStructure();
        return $this->cmsElementStructure;
    }

}





/*
 * Blocks:

C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\blocks\text-image\ap-image-text\component\cms-block-component-ap-image-text.html.twig
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\blocks\text-image\ap-image-text\component\cms-block-component-ap-image-text.scss
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\blocks\text-image\ap-image-text\component\index.js


C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\blocks\text-image\ap-image-text\preview\cms-block-preview-ap-image-text.html.twig
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\blocks\text-image\ap-image-text\preview\cms-block-preview-ap-image-text.scss
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\blocks\text-image\ap-image-text\preview\index.js
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\blocks\text-image\ap-image-text\index.js
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\blocks\text-image\index.js
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\blocks\index.js


ELement

C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\index.js
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\ap-image-text\component\cms-element-component-ap-image-text.html.twig
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\ap-image-text\component\cms-element-component-ap-image-text.scss
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\ap-image-text\component\index.js

C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\ap-image-text\config\cms-element-config-ap-image-text.html.twig
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\ap-image-text\config\cms-element-config-ap-image-text.scss
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\ap-image-text\config\index.js
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\ap-image-text\preview\cms-element-preview-ap-image-text.html.twig
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\ap-image-text\preview\cms-element-preview-ap-image-text.scss
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\ap-image-text\preview\index.js

C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\ap-image-text\index.js
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\elements\index.js




SNippet
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\snippet\de-DE.json
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\snippet\en-GB.json
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\module\sw-cms\index.js


Main
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\administration\src\main.js




SCSS

C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\storefront\src\scss\component\_ap_image_text.scss
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\app\storefront\src\scss\base.scss



Config

C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\config\plugin.png
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\config\services.xml




Public

C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\public\administration\js\ap-cms-image-text.js
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\public\administration\css\ap-cms-image-text.css






View
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\views\storefront\element\cms-element-ap-image-text.html.twig
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\Resources\views\storefront\block\cms-block-ap-image-text.html.twig



Class
C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\src\ApCmsImageText.php



C:\Users\mismail\Desktop\Dolezych\src\custom\plugins\ApCmsImageText\composer.json





 */
/*
 * Blockssss:


"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/text-image/$cmsBlocksTechnicalName/component/cms-block-component-$cmsBlocksTechnicalName.html.twig",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/text-image/$cmsBlocksTechnicalName/component/cms-block-component-$cmsBlocksTechnicalName.scss",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/text-image/$cmsBlocksTechnicalName/component/index.js",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/text-image/$cmsBlocksTechnicalName/preview/cms-block-preview-$cmsBlocksTechnicalName.html.twig",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/text-image/$cmsBlocksTechnicalName/preview/cms-block-preview-$cmsBlocksTechnicalName.scss",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/text-image/$cmsBlocksTechnicalName/preview/index.js",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/text-image/$cmsBlocksTechnicalName/index.js",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/text-image/index.js",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/blocks/index.js",



ELementttt


"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/index.js",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/component/cms-element-component-$cmsElementTechnicalName.html.twig",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/component/cms-element-component-$cmsElementTechnicalName.scss",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/component/index.js",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/config/cms-element-config-$cmsElementTechnicalName.html.twig",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/config/cms-element-config-$cmsElementTechnicalName.scss",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/config/index.js",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/preview/cms-element-preview-$cmsElementTechnicalName.html.twig",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/preview/cms-element-preview-$cmsElementTechnicalName.scss",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/preview/index.js",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementTechnicalName/index.js",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/elements/index.js",


SNippettt

"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/snippet/de-DE.json",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/snippet/en-GB.json",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/module/sw-cms/index.js",


Mainn
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/administration/src/main.js",


SCSSs

"$this->outputFolder/$pluginTechnicalName/src/Resources/app/storefront/src/scss/component/_$cmsElementTechnicalName.scss",
"$this->outputFolder/$pluginTechnicalName/src/Resources/app/storefront/src/scss/base.scss",


configg

"$this->outputFolder/$pluginTechnicalName/src/Resources/config/plugin.png",
"$this->outputFolder/$pluginTechnicalName/src/Resources/config/services.xml",


public
"$this->outputFolder/$pluginTechnicalName/src/Resources/public/administration/js/$cmsElementTechnicalName.js",
"$this->outputFolder/$pluginTechnicalName/src/Resources/public/administration/css/$cmsElementTechnicalName.css",


views
"$this->outputFolder/$pluginTechnicalName/src/Resources/views/storefront/element/cms-element-$cmsElementTechnicalName.html.twig",
"$this->outputFolder/$pluginTechnicalName/src/Resources/views/storefront/block/cms-block-$cmsElementTechnicalName.html.twig",



phpclass
"$this->outputFolder/$pluginTechnicalName/src/pluginTechnicalName.php",



"$this->outputFolder/$pluginTechnicalName/composer.json"

 */