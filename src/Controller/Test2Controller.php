<?php

namespace App\Controller;

use App\Service\FileCreationService;
use App\Service\FolderStructureService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Test2Controller extends AbstractController
{
    private FileCreationService $fileCreationService;

    public function __construct(FileCreationService $fileCreationService)
    {
        $this->fileCreationService = $fileCreationService;
    }




    #[Route('/test2', name: 'app_test2')]
    public function index(): Response
    {
        // Angenommener Root-Pfad, ändern Sie dies nach Bedarf
        $rootPath = $this->getParameter('output_folder');
        $this->fileCreationService->createFile("$rootPath/main.js", 'js');
        return new Response('main.js wurde erstellt');


    }
}
