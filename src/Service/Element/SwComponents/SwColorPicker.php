<?php

namespace App\Service\Element\SwComponents;

use App\Service\FormDataManager;

class SwColorPicker
{
    public function __construct(private FormDataManager $formDataManager)
    {
    }

//    generateColorPicker
    public function render($fieldsData): string
    {
        $fieldTechnicalName = $fieldsData->fieldTechnicalName;
        return <<<EOT
        <sw-colorpicker
              v-model=element.config.$fieldTechnicalName.value"
              :label="\$tc('sw-cms.elements.vimeoVideo.config.label.controlsColor')"
              color-output=hex"
        />
        </sw-colorpicker>
EOT;
    }
}