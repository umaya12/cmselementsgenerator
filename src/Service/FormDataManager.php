<?php

namespace App\Service;

class FormDataManager
{
    private array $cmsFormData;

    public function storeCmsElementFromData(array $data)
    {
        $this->cmsFormData = $data;
    }

    public function getCmsFormData(): array
    {
        return $this->cmsFormData;
    }

}