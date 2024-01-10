<?php
//تم مراعاة موضوع انها فقط للـ CMS Element
//Need Only Content
namespace App\Service\Snippet;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;
use App\Helper\FormatConverter;

class SnippetDe implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
        private FormatConverter $formatConverter
    ) {
    }

    public function createFile(string $path): void
    {
        if (strpos($path, "sw-cms/snippet/de-DE.json")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsBlocksTechnicalName = $this->formatConverter->convertToCamelCase($formData['cmsBlocksTechnicalName'], true);
        $cmsElementTechnicalName = $this->formatConverter->convertToCamelCase($formData['cmsElementTechnicalName'],
            true);
        $cmsElementLabelDE = $formData['cmsElementLabelDE'];
        $cmsBlocksLabelDE = $formData['cmsBlocksLabelDE'];
        $config = $this->getConfigLabel();
        $content = <<<EOT
         {
  "ap": {
    "cms": {
      "blocks": {
        "$cmsBlocksTechnicalName": {
          "label": "$cmsBlocksLabelDE"
        }
      },
      "elements": {
        "$cmsElementTechnicalName": {
          "label": "$cmsElementLabelDE",
          "config":  {
 $config
          }
        }
      }
    }
  }
}

EOT;
        return $content;
    }

//ظبط الفانكشن هون و حل مشكلة الفاصلة
    public function getConfigLabel(): string
    {
        $fieldsData = $this->cmsFormDataManager->getCmsFieldsData();
        $result = "";
//        $total = count($fieldsData);
        $lengthFieldsData = count($fieldsData);
        foreach ($fieldsData as $index => $value) {
            $removeComma = $index == $lengthFieldsData - 1 ? "" : ",";
            $result .= <<<EOT
        "{$value->fieldTechnicalName}": {
            "label": "{$value->fieldLabel}"
        }
EOT. $removeComma . "\n";
        }
        return $result;
    }

}