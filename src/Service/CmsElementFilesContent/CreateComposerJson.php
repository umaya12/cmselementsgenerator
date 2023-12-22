<?php

namespace App\Service\CmsElementFilesContent;

use App\Interface\FileCreatorInterface;
use App\Service\FormDataManager;

class CreateComposerJson implements FileCreatorInterface
{

    private FormDataManager $cmsFormDataManager;

    public function __construct(
        FormDataManager $cmsFormDataManager
    ) {
        $this->cmsFormDataManager = $cmsFormDataManager;
    }

    public function createFile(string $path): void
    {
        if (strpos($path, "composer.json")) {
            file_put_contents($path, $this->getContent());
        }
    }

    public function getContent()
    {
        $formData = $this->cmsFormDataManager->getCmsFormData();
        $pluginTechnicalName = $formData['pluginTechnicalName'];
        $version = $formData['version'];
        $pluginDescription = $formData['pluginDescription'];
        $pluginLabelDE = $formData['pluginLabelDE'];
        $pluginLabelEN = $formData['pluginLabelEN'];
        $content = [
            "name" => "ap/cms-image-text",
            "description" => "{$pluginDescription}",
            "type" => "shopware-platform-plugin",
            "license" => "proprietary",
            "version" => "{$version}",
            "authors" => [
                [
                    "name" => "apollon GmbH+Co. KG"
                ]
            ],
            "autoload" => [
                "psr-4" => [
                    "{$pluginTechnicalName}\\" => "src/"
                ]
            ],
            "extra" => [
                "shopware-plugin-class" => "{$pluginTechnicalName}\\{$pluginTechnicalName}",
                "label" => [
                    "de-DE" => "{$pluginLabelDE} ",
                    "en-GB" => "{$pluginLabelEN}"
                ]
            ]
        ];
        return json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

}