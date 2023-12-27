<?php

namespace App\Controller;

use App\Service\CmsElementFileCreation;
use App\Service\FolderCreation;
use App\Service\FolderStructure;
 use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Test2Controller extends AbstractController
{

    public function __construct(
        private FolderStructure $structure,
//        private CmsElementFileCreation $fileCreationService,
        private FolderCreation $folderCreation,
    ) {
    }

    #[Route('/test2', name: 'app_test2')]
    public function index(): Response
    {
        //get Structure
//        $structure = $this->structure->getCmsElementStructure();
//        //! Create Structure
//        $createFolders = $this->folderCreation->createStructure($structure);

//        foreach ($structure as $path) {
//            $this->fileCreationService->createFile($path);
//        }

        return $this->render('test2/index.html.twig', [
            'createFolders' => "ddd",
//            'createFolders' => $createFolders,
        ]);
    }
}
