<?php
//تم مراعاة موضوع انها فقط للـ CMS Element
//Need Only Content
namespace App\Service\Snippet;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class SnippetGb implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }

    public function createFile(string $path): void
    {
        if (strpos($path, "sw-cms/snippet/en-GB.json")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        return "Need Only Content";
    }
}