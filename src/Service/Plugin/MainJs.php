<?php
// src/Service/CreateMainJs.php
namespace App\Service\Plugin;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class MainJs implements FileCreatorInterface
{

    public function __construct(
        private FormDataManager $cmsFormDataManager,
    ) {
    }
    public function createFile(string $path): void
    {
        if (strpos($path, 'src/main.js')) {
            // Logik zum Erstellen einer main.js-Datei
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent(): string
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $insertEnLang=$formData["isEnglishVersionActive"] ===true?"import enGB from './module/sw-cms/snippet/en-GB.json';
Shopware.Locale.extend('en-GB', enGB);":"";
         $content = "import './module/sw-cms/elements';
import './module/sw-cms/blocks';
import deDE from './module/sw-cms/snippet/de-DE.json';
$insertEnLang
Shopware.Locale.extend('de-DE', deDE);
";
        return $content;
    }
}
