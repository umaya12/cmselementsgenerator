<?php

namespace App\Service\Element\SwComponents;

use App\Helper\FormatConverter;
use App\Service\FormDataManager;

class SwTextField
{
    public function __construct(
        private FormDataManager $formDataManager,
        private FormatConverter $formatConverter
    ) {
    }

//generateTextField
    public function render($fieldsData): string
    {
        $fieldTechnicalName = $fieldsData->fieldTechnicalName;
        $formData = $this->formDataManager->getCmsFormData();
        $cmsElementTechnicalName = $this->formatConverter->convertToCamelCase($formData['cmsElementTechnicalName'],true);
        return <<<EOT
        <sw-text-field
              v-model="element.config.$fieldTechnicalName.value"
              :label="\$tc('ap.cms.elements.$cmsElementTechnicalName.config.{$fieldTechnicalName}.label')"
              :placeholder="\$tc('sw-cms.elements.image.config.placeholder.enterMinHeight')"
              @input="emitChanges"
        />
        </sw-text-field>
EOT;
    }

}