<?php
//Need Only Content

namespace App\Service\Element;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsElementPreviewCmsElementTechnicalNameScss implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        if (strpos($path, "cms-element-preview-$cmsElementTechnicalName.scss")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
    $content=".$cmsElementTechnicalName-preview{
  position: relative;
  width: 152px;
  height: 110px;
  overflow: hidden;
  img {
    position: absolute;
    object-fit: scale-down;
    width: 100%;
    height: 100%;
  }
}";

        return $content;
    }
}