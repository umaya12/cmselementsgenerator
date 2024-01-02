<?php

namespace App\Service\Views;

use App\Helper\FormatConverter;
use App\Interface\FileCreatorInterface;
use App\Service\Element\SwComponents\ComponentsFactory;
use App\Service\FormDataManager;

class ViewCmsElementCmsElementTechnicalNameHtmlTwig implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
        private FormatConverter $formatConverter,
        private ComponentsFactory $componentsFactory
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        if (strpos($path, "element/cms-element-$cmsElementTechnicalName.html.twig")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $twigTagCmsElementTechnicalName = $this->formatConverter->convertToTwigTags($cmsElementTechnicalName);
        $fields = $this->componentsFactory->generateTwigFieldTemplates();
        $content = <<<EOT
{% block $twigTagCmsElementTechnicalName %}

$fields

{% endblock %}
EOT;
        return $content;
    }



}