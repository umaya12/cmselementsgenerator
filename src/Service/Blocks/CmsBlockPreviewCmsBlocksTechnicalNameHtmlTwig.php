<?php

namespace App\Service\Blocks;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsBlockPreviewCmsBlocksTechnicalNameHtmlTwig implements FileCreatorInterface
{
    public function __construct(private FormDataManager $cmsFormDataManager)
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
        $content = "
            {% block element_ap_image_text %}
            <div class=\"d-flex justify-content-center align-items-center\">
                <img style=\"width: 100%\"
                     :src=\"'apcmsimagetext/static/img/cms/component_cms_element.jpg' | asset\"
                     alt=\"\"
                >
            </div>
            {% endblock %}
        ";
        return $content;
    }
}