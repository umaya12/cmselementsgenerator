<?php

namespace App\Service\Element;

use App\Helper\FormatConverter;
use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsElementPreviewCmsElementTechnicalNameHtmlTwig implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
        private FormatConverter $formatConverter,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        if (strpos($path, "cms-element-preview-$cmsElementTechnicalName.html.twig")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $pluginTechnicalNameImage=$formData["pluginTechnicalNameImage"];
        $pluginTechnicalNameImageImage = $this->formatConverter->removeHyphens($cmsElementTechnicalName);
        $twigTagCmsElementTechnicalName = $this->formatConverter->convertToTwigTags($cmsElementTechnicalName);
        $content = "{% block $twigTagCmsElementTechnicalName %}
            <div class=\"$cmsElementTechnicalName-preview\">
                 <img
                        :src=\"'$pluginTechnicalNameImageImage/static/img/cms/component_cms_element.jpg' | asset\"
                        alt=\"$pluginTechnicalNameImageImage\"
                >
            </div>
{% endblock %}";
        return $content;
    }
}