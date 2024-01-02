<?php
namespace App\Service\Views;

use App\Helper\FormatConverter;
use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class ViewCmsBlockCmsBlocksTechnicalNameHtmlTwig implements FileCreatorInterface{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
        private FormatConverter $formatConverter
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        if (strpos($path, "block/cms-block-$cmsBlocksTechnicalName.html.twig")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $twigTagCmsBlocksTechnicalName = $this->formatConverter->convertToTwigTags($cmsBlocksTechnicalName);        $content =<<<EOT
{% block $twigTagCmsBlocksTechnicalName %}
    {% set element = block.slots.getSlot('$cmsElementTechnicalName') %}
    <div data-cms-element-id="{{ element.id }}" class="col-12">
        {% sw_include "@Storefront/storefront/element/cms-element-" ~ element.type ~ ".html.twig" ignore missing %}
    </div>
{% endblock %}
EOT;
        return $content;
    }
}