<?php

namespace App\Service\Blocks;

use App\Helper\FormatConverter;
use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsBlockComponentCmsBlocksTechnicalNameHtmlTwig implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
        private FormatConverter $formatConverter
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        if (strpos($path, "cms-block-component-$cmsBlocksTechnicalName.html.twig")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $twigTagCmsBlocksTechnicalName = $this->formatConverter->convertToTwigTags($cmsBlocksTechnicalName);
        $content = "
            {% block $twigTagCmsBlocksTechnicalName %}
        <div class=\"sw-cms-block-$cmsBlocksTechnicalName\">
            <slot name=\"$cmsElementTechnicalName\"></slot>
        </div>
        {% endblock %}
        ";
        return $content;
    }
}