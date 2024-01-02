<?php
//Need Only Content
namespace App\Service\Element;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsElementComponentCmsElementTechnicalNameScss implements FileCreatorInterface
{
    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        if (strpos($path, "cms-element-component-$cmsElementTechnicalName.scss")) {
            file_put_contents($path, $this->getContent($cmsElementTechnicalName));
        }
        // TODO: Implement createFile() method.
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $content = ".$cmsElementTechnicalName-component{
  width: 100%;
  height: 100%;
  overflow: hidden;
  img {
    margin: 0;
    display: block;
    width: 100%;
  }
}
";
        return $content;
    }
}