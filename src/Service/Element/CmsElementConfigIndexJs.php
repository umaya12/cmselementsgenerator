<?php

namespace App\Service\Element;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CmsElementConfigIndexJs implements FileCreatorInterface
{
    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        if (strpos($path, "$cmsElementTechnicalName/config/index.js")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $cmsElementTechnicalName = $formData["cmsElementTechnicalName"];
        $content = "import template from './cms-element-config-$cmsElementTechnicalName.html.twig';
import './cms-element-config-$cmsElementTechnicalName.scss';

const {Component, Mixin} = Shopware;

Component.register(\"sw-cms-el-config-$cmsElementTechnicalName\",{
    template,
    mixins: [
        Mixin.getByName('cms-element')
    ],

    data() {
        return {
 
        };
    },
    computed:{
 
    },
    created(){
        this.createdComponent();
    },
    methods:{
        createdComponent() {
            this.initElementConfig('$cmsElementTechnicalName');
        },
        emitChanges() {
            this.\$emit\('element-update', this.element);

        },
    }

})";
        return $content;
    }
}