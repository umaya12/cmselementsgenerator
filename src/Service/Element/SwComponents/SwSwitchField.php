<?php

namespace App\Service\Element\SwComponents;

use App\Service\FormDataManager;

class SwSwitchField
{
    public function __construct(private FormDataManager $formDataManager)
    {
    }
//generateSwitchField
    public function render($fieldsData): string
    {
        $fieldTechnicalName = $fieldsData->fieldTechnicalName;

        return <<<EOT
        <sw-switch-field
              v-model="element.config.$fieldTechnicalName.value"
              :label=\$tc('sw-cms.elements.vimeoVideo.config.label.$fieldTechnicalName')"
        />
        </sw-switch-field>
EOT;
    }

}