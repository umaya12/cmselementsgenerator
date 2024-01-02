<?php

namespace App\Service\Element\SwComponents;

use App\Service\FormDataManager;

class SwTextField
{
    public function __construct(private FormDataManager $formDataManager)
    {
    }
//generateTextField
    public function render($fieldsData): string
    {
        $fieldTechnicalName = $fieldsData->fieldTechnicalName;
        return <<<EOT
        <sw-text-field
              v-model="element.config.$fieldTechnicalName.value"
              :label="\$tc('sw-cms.elements.image.config.{$fieldTechnicalName}Label.$fieldTechnicalName')"
              :placeholder="\$tc('sw-cms.elements.image.config.placeholder.enterMinHeight')"
              @input="emitChanges"
        />
        </sw-text-field>
EOT;
    }

}