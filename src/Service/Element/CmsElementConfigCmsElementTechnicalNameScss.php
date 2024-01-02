<?php

namespace App\Service\Element;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsElementConfigCmsElementTechnicalNameScss implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        if (strpos($path, "cms-element-config-$cmsElementTechnicalName.scss")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $content=".$cmsElementTechnicalName{
  img{
    width: 100%;
    height: 100%;
  }
}";

        return $content;
    }
}