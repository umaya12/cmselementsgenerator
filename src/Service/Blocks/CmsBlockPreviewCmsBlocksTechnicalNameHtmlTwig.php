<?php

namespace App\Service\Blocks;

use App\Helper\FormatConverter;
use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsBlockPreviewCmsBlocksTechnicalNameHtmlTwig implements FileCreatorInterface
{
    public function __construct(private FormDataManager $cmsFormDataManager, private FormatConverter $formatConverter)
    {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        if (strpos($path, "cms-block-preview-$cmsBlocksTechnicalName.html.twig")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        $pluginTechnicalName = $formData["pluginTechnicalName"];
        $pluginTechnicalNameImage = $this->formatConverter->removeHyphens($pluginTechnicalName);
        $twigTagCmsBlocksTechnical = $this->formatConverter->convertToTwigTags($cmsBlocksTechnicalName);

        $content = "{% block element_{$twigTagCmsBlocksTechnical} %}
            <div class=\"d-flex justify-content-center align-items-center\">
                <img style=\"width: 100%\"
                     :src=\"'$pluginTechnicalNameImage/static/img/cms/component_cms_element.jpg' | asset\"
                     alt=\"$pluginTechnicalNameImage\"
                >
            </div>
{% endblock %}";
        return $content;
    }
}