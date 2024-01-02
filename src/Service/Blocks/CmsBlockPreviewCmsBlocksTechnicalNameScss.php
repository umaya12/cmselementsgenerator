<?php
//Need Only Content
namespace App\Service\Blocks;


use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsBlockPreviewCmsBlocksTechnicalNameScss implements  FileCreatorInterface{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        if (strpos($path, "cms-block-preview-$cmsBlocksTechnicalName.scss")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        // TODO: Implement getContent() method.
        return "//Need Only Content
";
    }
}