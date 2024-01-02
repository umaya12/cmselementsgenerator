<?php

namespace App\Service\Element;

use App\Service\FormDataManager;

class ComponentsFactory
{
    public function __construct(private FormDataManager $formDataManager)
    {
    }

    public function componentsGenerator()
    {
        $fieldsData = $this->formDataManager->getCmsFieldsData();
        $componentsConfigs = [];
        foreach ($fieldsData as $fields) {
            foreach ($fields as $values) {
                $components = [];
                $fieldTechnicalName = $values->fieldTechnicalName;
                $fieldLabel = $values->fieldLabel;
                $fieldComponent = $values->fieldComponent;
//                $fieldPlaceholder=$values->fieldPlaceholder;
//                $fieldPlaceholder=$values->fieldPlaceholder;
                if ($fieldComponent === 'sw-text-field') {
                    $components[] = <<<EOT
    <sw-text-field
         v-model="element.config.$fieldTechnicalName.value"
         :label="\$tc('sw-cms.elements.image.config.{$fieldTechnicalName}Label.$fieldTechnicalName')"
         :placeholder="\$tc('sw-cms.elements.image.config.placeholder.enterMinHeight')"
         @input="emitChanges"
    />
EOT;
                } elseif ($fieldComponent === 'sw-text-editor') {
                    $components[] = <<<EOT
    <sw-text-editor
         v-model="element.config.$fieldTechnicalName.value"
         :label="\$tc('sw-cms.elements.image.config.{$fieldTechnicalName}Label.$fieldTechnicalName')"
         :allow-inline-data-mapping="true"
         sanitize-input
         @input="emitChanges"
         @blur="emitChanges"
    />
EOT;
                }elseif ($fieldComponent === 'sw-media-field') {
                    $components[] = <<<EOT
    <sw-media-field
         v-model="element.config.$fieldTechnicalName"
         :label="\$tc('sw-cms.elements.image.config.{$fieldTechnicalName}Label.$fieldTechnicalName')"
         @input="emitChanges"
         @blur="emitChanges">
    </sw-media-field>
EOT;
                }
                $componentsConfigs[] = $components;
            }
        }
//         $datei = implode( $componentsConfigs);
//        echo("<pre>");
//        print_r($datei);
//        echo("</pre>");
//        exit;
        $componentsStrings = array_map(function($componentArray) {
            return implode("\n", $componentArray);
        }, $componentsConfigs);

        $finalString = implode("\n", $componentsStrings);
        return $finalString;

    }

    public function defaultConfigGenerator($fieldsData): string
    {
        $defaultConfigs = [];
        foreach ($fieldsData as $fields) {
            // Bestimmen, ob das Feld erforderlich ist
            foreach ($fields as $values) {
                $fieldTechnicalName = $values->fieldTechnicalName;
                $isBoolean = $values->fieldComponent === 'sw-switch-field' || $values->fieldComponent === 'sw-checkbox-field' ? 'false' : '';
                $isRequired = $values->fieldRequired === true ? 'true' : 'false';
                $fieldsContent = "
            $fieldTechnicalName:{
            source:'static',
            value:'$isBoolean',
            required:$isRequired
        },";
                $defaultConfigs[] = $fieldsContent;
            }
        }
        return implode("\n", $defaultConfigs);
    }

}