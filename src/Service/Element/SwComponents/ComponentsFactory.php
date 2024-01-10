<?php

namespace App\Service\Element\SwComponents;

use App\Service\FormDataManager;

class ComponentsFactory
{
    public function __construct(
        private FormDataManager $formDataManager,
        private ComponentsManager $componentsManager,
    ) {
    }

//هنا قم بالدخول معلومات الفورمولار , و دور على كل عنصر و طبق عليك الفانكشن السفلية التي ستقوم بفحص شو نوع الفليد و تستدعي الكمبونينت تبعه و تضيف للمصفوفة التي ستأتي الى هنا
    public function componentsGenerator()
    {
        $fieldsData = $this->formDataManager->getCmsFieldsData();
        $components = array_map([$this, 'generateComponentForField'], $fieldsData);
        return implode("\n", $components);
    }

//توليد الكمبونينت بملف التويغ تبع الconfig
    public function generateComponentForField($fieldsData): string
    {
        $componentsConfigs = [];
        switch ($fieldsData->fieldComponent) {
            case "sw-text-field":
                $componentsConfigs[] = $this->componentsManager->getSwTextField()->render($fieldsData);
                break;
            case "sw-text-editor":
                $componentsConfigs[] = $this->componentsManager->getSwTextEditor()->render($fieldsData);
                break;
            case "sw-media-field":
                $componentsConfigs[] = $this->componentsManager->getSwMediaField()->render($fieldsData);
                break;
            case "sw-media-upload-v2":
                $componentsConfigs[] = $this->componentsManager->getSwMediaUploadV2()->render($fieldsData);
                break;
            case "sw-checkbox-field":
                $componentsConfigs[] = $this->componentsManager->getSwCheckboxField()->render($fieldsData);
                break;
            case "sw-switch-field":
                $componentsConfigs[] = $this->componentsManager->getSwSwitchField()->render($fieldsData);
                break;
            case "sw-colorpicker":
                $componentsConfigs[] = $this->componentsManager->getSwColorPicker()->render($fieldsData);
                break;
            default:
                $componentsConfigs[] = "kein passendecomponent";
                break;
        }
        return implode("\n", $componentsConfigs);
    }

//تقوم بتوليد اسماء الفيلدات لملف الـ index.js
    public function defaultConfigGenerator($fieldsData): string
    {
        $defaultConfigs = [];
        foreach ($fieldsData as $fields) {
//            dump($fields->fieldRequired);
//            exit;
            // Bestimmen, ob das Feld erforderlich ist
            $fieldTechnicalName = $fields->fieldTechnicalName;
            $isBoolean = $fields->fieldComponent === 'sw-switch-field' || $fields->fieldComponent === 'sw-checkbox-field' ? 'false' : '';
            $isRequired = isset($fields->fieldRequired) === true ? 'true' : 'false';
            $fieldsContent = "
            $fieldTechnicalName:{
            source:'static',
            value:'$isBoolean',
            required:$isRequired
        },";
        $defaultConfigs[] = $fieldsContent;
        }
        return implode("\n", $defaultConfigs);
    }

    // تستقبل الفيلدات تبع الكونغيغ لحتى تحصطعم داخل الفيو و يسهل استدعائهن
    public function generateTwigFieldTemplates():string
    {
        $fieldsData = $this->formDataManager->getCmsFieldsData();
        $twigCode = '';
        $formData = $this->formDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];

        foreach ($fieldsData as $field) {
            $fieldTechnicalName = $field->fieldTechnicalName;
            switch ($field->fieldComponent) {
                case "sw-text-field":
                case "sw-text-editor":
                    $twigCode.= "   {% set $fieldTechnicalName = element.config.$fieldTechnicalName.value|raw %}\n";
                    break;
                case "   sw-media-field":
                    $twigCode.=  "   sw-media-field \n";
                    break;
                case "sw-media-upload-v2":
                    $twigCode.=  "   {% set $fieldTechnicalName = element.config.$fieldTechnicalName.value %}\n
        {% if $fieldTechnicalName %}
               {% set mediaCollection$fieldTechnicalName = searchMedia([$fieldTechnicalName], context.context) %}
               {% set media$fieldTechnicalName = mediaCollection.get($fieldTechnicalName) %}
        {% endif %}
        {% if media$fieldTechnicalName is defined %}
           {% sw_thumbnails '$cmsElementTechnicalName-thumbnails' with {
               media: media$fieldTechnicalName,
               attributes: {
                   'alt': media$fieldTechnicalName.alt,
                   'title': media$fieldTechnicalName.title,
               },
               sizes: {
                   'xs': '400px',
                   'sm': '600px',
                   'md': '800px',
                   'lg': '800px',
                   'xl': '1000px',
                   'xxl': '1000px'
               }
           } %}
        {% endif %}";
                    break;
                default:
                    $twigCode.=  "{% set $fieldTechnicalName = element.config.$fieldTechnicalName.value %}\n";
                    break;
            }
        }
        return $twigCode;

    }

}