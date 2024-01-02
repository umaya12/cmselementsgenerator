<?php

namespace App\Controller;

use App\Service\CmsElementFileCreation;
use App\Service\FolderCreation;
use App\Service\FolderStructure;
use App\Service\FormDataManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormCreateCmsElementController extends AbstractController
{

    public function __construct(
        private FormDataManager $formDataManager,
        private FolderStructure $cmsElementStructure,
        private FolderCreation $folderCreation,
        private CmsElementFileCreation $fileCreationService,
    ) {
    }

    #[Route('/createcmselement', name: 'form_create_cms_element')]
    public function index(Request $request): Response
    {
        // Form Data Exportieren
        $cmsElementForm = json_decode($request->getContent());

        $cmsElementFormData = [];
        $cmsFields = [];
        if(isset($cmsElementForm)){
            foreach ($cmsElementForm as $withoutSteps) {
                foreach ($withoutSteps as $key => $value) {
                    if ($key !== "fields") {
                        $cmsElementFormData[$key] = $value;
                    } else {
                        $cmsFields[] = $value;
                    }
                }
            }
            $this->formDataManager->storeCmsElementFromData($cmsElementFormData,$cmsFields);
            // get folder structor
            $structures = $this->cmsElementStructure->getCmsElementStructure();
            // create folder structor
            $this->folderCreation->createStructure($structures);
            foreach ($structures as $path) {
                $this->fileCreationService->createFile($path);
            }
            return new JsonResponse(["msg" => "Cms Element wurden angelegt, bitte warten bis Sie die Daten herunterladen können "], 200); // 400 Bad Request

        }
        return $this->render("form_create_cms_element/index.html.twig", [
            "Hello"=>"Hello",
        ]);



    }


}









