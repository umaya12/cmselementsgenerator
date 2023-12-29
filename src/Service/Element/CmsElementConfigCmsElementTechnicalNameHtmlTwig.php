<?php
namespace App\Service\Element;



use App\Helper\FormatConverter;
use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsElementConfigCmsElementTechnicalNameHtmlTwig implements FileCreatorInterface {

    public function __construct(
        private FormDataManager $cmsFormDataManager,
        private FormatConverter $formatConverter,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        if (strpos($path, "cms-element-config-$cmsElementTechnicalName.html.twig")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $twigTagCmsElementTechnicalName = $this->formatConverter->convertToTwigTags($cmsElementTechnicalName);
        $content = "{% block {$twigTagCmsElementTechnicalName}_config %}
                <sw-container>
            
                </sw-container>
{% endblock %}";
        return $content;
    }
}