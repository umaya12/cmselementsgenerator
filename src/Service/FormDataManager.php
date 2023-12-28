<?php

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
        return $this->cmsFieldsData;
    }
}