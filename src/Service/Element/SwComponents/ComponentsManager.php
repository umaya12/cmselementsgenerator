<?php

namespace App\Service\Element\SwComponents;

class ComponentsManager
{
    public function __construct(
        private SwTextField $swTextField,
        private SwTextEditor $swTextEditor,
        private SwMediaField $swMediaField,
        private SwMediaUploadV2 $swMediaUploadV2,
        private SwCheckboxField $swCheckboxField,
        private SwSwitchField $swSwitchField,
        private SwColorPicker $swColorPicker
    ) {
    }

    public function getSwTextField(): SwTextField
    {
        return $this->swTextField;
    }

    public function getSwTextEditor(): SwTextEditor
    {
        return $this->swTextEditor;
    }

    public function getSwMediaField(): SwMediaField
    {
        return $this->swMediaField;
    }

    public function getSwMediaUploadV2(): SwMediaUploadV2
    {
        return $this->swMediaUploadV2;
    }

    public function getSwCheckboxField(): SwCheckboxField
    {
        return $this->swCheckboxField;
    }

    public function getSwSwitchField(): SwSwitchField
    {
        return $this->swSwitchField;
    }

    public function getSwColorPicker(): SwColorPicker
    {
        return $this->swColorPicker;
    }


//    public function getSwTextField($fieldData): string
//    {
//        return $this->swTextField->render($fieldData);
//    }
//
//    public function getSwTextEditor($fieldData): string
//    {
//        return $this->swTextEditor->render($fieldData);
//    }
//
//    public function getSwMediaField($fieldData): string
//    {
//        return $this->swMediaField->render($fieldData);
//    }
//
//    public function getSwMediaUploadV2($fieldData): string
//    {
//        return $this->swMediaUploadV2->generateMediaFieldUpload($fieldData);
//    }
//
//    public function getSwCheckboxField($fieldData): string
//    {
//        return $this->swCheckboxField->render($fieldData);
//    }
//
//    public function getSwSwitchField($fieldData): string
//    {
//        return $this->swSwitchField->render($fieldData);
//    }
//
//    public function getSwColorPicker($fieldData): string
//    {
//        return $this->swColorPicker->render($fieldData);
//    }

}