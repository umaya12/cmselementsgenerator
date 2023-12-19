<?php

namespace App\Controller;

use App\Service\FileCreationService;

// use App\Service\FolderStructureService;
use App\Service\FileStructureService;
use App\Service\FolderStructureService;
use App\Service\Structure;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Test2Controller extends AbstractController
{
    private FileCreationService $fileCreationService;
    private $structure;

    public function __construct(
        Structure $structure,
        FileCreationService $fileCreationService,
        private FolderStructureService $folderStructureService,
        private FileStructureService $fileStructureService
    ) {
        $this->fileCreationService = $fileCreationService;
    }

    #[Route('/test2', name: 'app_test2')]
    public function index(): Response
    {
        dump($this->structure);
        exit;
        $rootPath = $this->getParameter('output_folder');
        $cmsElementName = "Hallo";
        $structure = [
            "$rootPath/src/Resources/views/storefront/element/cms-element-$cmsElementName.html.twig",
            "$rootPath/src/Resources/app/administration/src/main.js",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/snippet/de-DE.json",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/snippet/en-GB.json",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/index.js",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/preview/index.js",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/preview/sw-cms-el-preview-$cmsElementName.html.twig",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/preview/sw-cms-el-preview-$cmsElementName.scss",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/elements/index.js",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/elements/sw-cms-el-$cmsElementName.html.twig",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/elements/sw-cms-el-$cmsElementName.scss",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/block/$cmsElementName/config/sw-cms-block-config-$cmsElementName.html.twig",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/config/index.js",
            "$rootPath/src/Resources/app/administration/src/module/sw-cms/elements/$cmsElementName/config/sw-cms-el-config-$cmsElementName.html.twig",
        ];
        //! Struktur Folders anlegen
        $rootDir = $this->getParameter('output_folder');
        $cmsElementName = "testing";
        $this->folderStructureService->createStructure($structure);
        foreach ($structure as $path) {
            $this->fileCreationService->createFile($path);
        }
        return new Response('main.js wurde erstellt');
    }
}
