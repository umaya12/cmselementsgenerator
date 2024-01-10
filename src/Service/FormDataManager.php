<?php
// المعلومات يلي هو جايية من الكوتارولر الرئيسي يلي عبيستقبل معلومات الفورمولار
namespace App\Service;

class FormDataManager
{
    private array $cmsFormData;
    private array $cmsFieldsData;

    public function storeCmsElementFromData(array $cmsElementFormData, array $cmsFieldsData)
    {
        $this->cmsFormData = $cmsElementFormData;
        $this->cmsFieldsData = $cmsFieldsData;
    }

    public function getCmsFormData(): array
    {
        return $this->cmsFormData;
    }

    public function getCmsFieldsData(): array
    {
//        dump($this->cmsFieldsData[0]);
        return $this->cmsFieldsData[0];
    }

}