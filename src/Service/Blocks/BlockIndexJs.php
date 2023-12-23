<?php

namespace App\Service\Blocks;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class BlockIndexJs implements FileCreatorInterface
{
    private $cmsFormDataManager;

    public function __construct(FormDataManager $cmsFormDataManager)
    {
        $this->cmsFormDataManager = $cmsFormDataManager;
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData['cmsBlocksTechnicalName'];
        if (strpos($path, "$cmsBlocksTechnicalName/index.js") !== false) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent()
    {
        $jsContent = "import './component';\n";
        $jsContent .= "import './preview';\n\n";
        $jsContent .= "Shopware.Service('cmsService').registerCmsBlock(";
        $jsContent .= json_encode($this->getBlockConfig(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $jsContent .= ");";
        return $jsContent;
    }

    private function getBlockConfig()
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData['cmsBlocksTechnicalName'];
        $cmsBlocksLabelDE = $formData['cmsBlocksLabelDE'];
        $cmsBlocksCategory = $formData['cmsBlocksCategory'];
        $cmsElementTechnicalName = $formData['cmsElementTechnicalName'];
        return [
            "name" => "{$cmsBlocksTechnicalName}",
            "label" => "ap.cms.blocks.{$cmsBlocksLabelDE}.label",
            "category" => "{$cmsBlocksCategory}",
            "component" => "sw-cms-block-{$cmsBlocksTechnicalName}",
            "previewComponent" => "sw-cms-preview-{$cmsBlocksTechnicalName}",
            "defaultConfig" => [
                "marginBottom" => "200px",
                "marginTop" => "50px",
                "marginLeft" => "0px",
                "marginRight" => "0px",
                "sizingMode" => "boxed",
            ],
            "slots" => [
                "{$cmsElementTechnicalName}" => "{$cmsElementTechnicalName}",
            ],
        ];
    }
}
