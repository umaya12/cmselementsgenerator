<?php

namespace App\Service\Element\SwComponents;

use App\Service\FormDataManager;

class SwCheckboxField
{
    public function __construct(private FormDataManager $formDataManager)
    {
    }
//generateCheckBoxField
    public function render($fieldsData): string
    {
        $fieldTechnicalName = $fieldsData->fieldTechnicalName;
        return <<<EOT
        <sw-checkbox-field
              v-model="element.config.$fieldTechnicalName.value"
              :label=\$tc('sw-cms.elements.vimeoVideo.config.label.$fieldTechnicalName')"
        />
        </sw-checkbox-field>
EOT;
    }

}