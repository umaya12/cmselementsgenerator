<?php

namespace App\Service\Storefront;

use App\Interface\FileCreatorInterface;
use App\Helper\FormatConverter;
use App\Service\FormDataManager;

class CmsElementBaseScss implements FileCreatorInterface
{
    public function __construct(
        private FormatConverter $formatConverter,
        private FormDataManager $cmsFormDataManager
    ) {
    }

    public function createFile(string $path): void
    {
        if (strpos($path, "base.scss")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $formatConverter = $this->formatConverter->convertToTwigTags($cmsElementTechnicalName);
        $content = "@import './component/ap_image_text';";
        return $content;
    }
}