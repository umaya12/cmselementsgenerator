<?php

namespace App\Service\Element;

use App\Interface\FileCreatorInterface;
use App\Service\Element\SwComponents\ComponentsManager;
use App\Service\Element\SwComponents\SwMediaUploadV2;
use App\Service\FormDataManager;

class CmsElementConfigIndexJs implements FileCreatorInterface
{
    public function __construct(
        private FormDataManager $cmsFormDataManager,
        private ComponentsManager $componentsManager,
        private SwMediaUploadV2 $swMediaUploadV2,
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
        //أجلب القيم من الفانكشن المكورة في حال مثلا كان صورة فلها محتوى في الداتا و الميثود الخ
        $data = isset($this->getContentConfigIndexJs()["data"]) ? $this->getContentConfigIndexJs()["data"] : '';
        $methods = isset($this->getContentConfigIndexJs()["methods"]) ? $this->getContentConfigIndexJs()["methods"] : '';
        $computed = isset($this->getContentConfigIndexJs()["computed"]) ? $this->getContentConfigIndexJs()["computed"] : '';
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
$data 
        };
    },
    computed:{
 $computed
    },
    created(){
        this.createdComponent();
    },
    methods:{
        createdComponent() {
            this.initElementConfig('$cmsElementTechnicalName');
        },
        emitChanges() {
            this.\$emit('element-update', this.element);
        },
$methods
    }
})";
        return $content;
    }

    public function getContentConfigIndexJs(): array
    {
        $fieldsData = $this->cmsFormDataManager->getCmsFieldsData();
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $final = [];
        foreach ($fieldsData as $value) {
            //اجلب محتويات الميثود و الكمبوتيد من الكمبونينت و ادخلهم داخل المصفوفة التي ستقوم بوضعههم داخل ملف index.js  تبع الكونفيغ
            $methodsContent = $this->swMediaUploadV2->getContentMethodsConfigIndexjs($value->fieldTechnicalName);
            $computedContent = $this->swMediaUploadV2->getContentComputedConfigIndexjs($value->fieldTechnicalName);
            if ($value->fieldComponent === "sw-media-upload-v2") {
                $final["data"] = "            mediaModalIsOpen: false,";
                $final["methods"] = $methodsContent;
                $final["computed"] = $computedContent;
            }
        }
        return $final;
    }

}