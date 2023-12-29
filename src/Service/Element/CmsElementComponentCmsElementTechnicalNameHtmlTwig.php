<?php

namespace App\Service\Element;

use App\Helper\FormatConverter;
use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsElementComponentCmsElementTechnicalNameHtmlTwig implements FileCreatorInterface
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
        if (strpos($path, "cms-element-component-$cmsElementTechnicalName.html.twig")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $pluginTechnicalName = $formData["pluginTechnicalName"];
        $pluginTechnicalNameImage = $this->formatConverter->removeHyphens($pluginTechnicalName);
        $twigTagCmsElementTechnicalName = $this->formatConverter->convertToTwigTags($cmsElementTechnicalName);
        $content = "{% block $twigTagCmsElementTechnicalName %}
            <div class=\"$cmsElementTechnicalName-component\">
                 <img
                        :src=\"'$pluginTechnicalNameImage/static/img/cms/component_cms_element.jpg' | asset\"
                        alt=\"$pluginTechnicalNameImage\"
                >
            </div>
{% endblock %}";
        return $content;
    }
}