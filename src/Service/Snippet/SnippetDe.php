<?php

namespace App\Service\Snippet;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class SnippetDe implements FileCreatorInterface{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();

        // TODO: Implement createFile() method.
    }

    public function getContent(): string
    {
        // TODO: Implement getContent() method.
        return "";
    }
}