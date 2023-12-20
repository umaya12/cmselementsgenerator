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

    public function __construct(
        private Structure $structure,
        FileCreationService $fileCreationService,
        private FolderStructureService $folderStructureService,
        private FileStructureService $fileStructureService
    ) {
        $this->fileCreationService = $fileCreationService;
    }

    #[Route('/test2', name: 'app_test2')]
    public function index(): Response
    {
        $structure = $this->structure->mainStructure();
        //! Struktur Folders anlegen
      $statu=  $this->folderStructureService->createStructure($structure);
        foreach ($structure as $path) {
            $this->fileCreationService->createFile($path);
        }
        return $this->render('test2/index.html.twig', [
            'controller_name' => $statu,
        ]);
    }
}
