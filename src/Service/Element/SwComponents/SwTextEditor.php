<?php

namespace App\Service\Element\SwComponents;

use App\Service\FormDataManager;

class SwTextEditor
{
    public function __construct(private FormDataManager $formDataManager)
    {
    }
//generateTextEditor
    public function render($fieldsData): string
    {
        $fieldTechnicalName = $fieldsData->fieldTechnicalName;
        return <<<EOT
        <sw-text-editor
              v-model="element.config.$fieldTechnicalName.value"
              :label="\$tc('sw-cms.elements.image.config.{$fieldTechnicalName}Label.$fieldTechnicalName')"
              :allow-inline-data-mapping="true"
              sanitize-input
              @input="emitChanges"
              @blur="emitChanges"
        />
EOT;
    }

}