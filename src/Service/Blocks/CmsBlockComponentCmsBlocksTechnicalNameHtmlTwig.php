<?php

namespace App\Service\Blocks;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsBlockComponentCmsBlocksTechnicalNameHtmlTwig implements FileCreatorInterface
{

    public function __construct(private FormDataManager $cmsFormDataManager)
    {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $formData["cmsBlocksTechnicalName"];
        if (strpos($path, "cms-block-component-$cmsBlocksTechnicalName.html.twig")) {
            file_put_contents($path, $this->getContent($cmsBlocksTechnicalName));
        }
    }

    public function getContent($cmsBlocksTechnicalName)
    {
        $content = "
            {% block element_ap_image_text %}
        <div class=\"sw-cms-block-$cmsBlocksTechnicalName\">
            <slot name=\"ApCmsImageText\"></slot>
        </div>
        {% endblock %}
        ";
        return $content;
    }
}