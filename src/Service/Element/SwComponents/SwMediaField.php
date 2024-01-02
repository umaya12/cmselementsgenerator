<?php

namespace App\Service\Element\SwComponents;

use App\Service\FormDataManager;

class SwMediaField
{
    public function __construct(private FormDataManager $formDataManager)
    {
    }

//generateMediaField
    public function render($fieldsData): string
    {
        $fieldTechnicalName = $fieldsData->fieldTechnicalName;
        return <<<EOT
        <sw-media-field
              v-model="element.config.$fieldTechnicalName"
              :label="\$tc('sw-cms.elements.image.config.{$fieldTechnicalName}Label.$fieldTechnicalName')"
              @input="emitChanges"
              @blur="emitChanges">
        </sw-media-field>
EOT;
    }

}