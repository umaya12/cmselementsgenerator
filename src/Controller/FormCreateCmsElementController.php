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
//        $pluginTechnicalName = $request->request->get('pluginTechnicalName');
//        $cmsElementFormData = $request->request->all();
//        $pluginTechnicalName = $request->request->get('pluginTechnicalName');
//        $cmsElementFormData = $request->request->all();
        $cmsElementForm = json_decode($request->getContent());



        $cmsElementFormData = [];
        $cmsFields = [];
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
        // dump($structure);
        // exit;
        return new JsonResponse(["msg" => "Alles gut "], 200); // 400 Bad Request

    }

//    #[Route('/testemich/{cmsElementTechnicalName}', name: 'form_create_cms_element')]
//    public function convertToTwigTags($cmsElementTechnicalName)
//    {
////        $data = "HalloIchBinMuhmmad Muhamm-adK";
////        $convertToArray = str_split($test);
//        $result = "";
//        $dataConverted = str_split($cmsElementTechnicalName);
//        for ($i = 0; $i < count($dataConverted); $i++) {
//            $word = $dataConverted[$i];
//            if ($word == " ") {
//                $result .= "";
//                continue;
//            }
//            if ($word === "-") {
//                $result .= "_";
//                continue;
//            }
//            if (ctype_upper($word)) {
//                if ($i !== 0) {
//                    $result .= "_";
//                }
//            }
//            $word = strtolower($word);
//            $result .= $word;
//        }
//        return new Response($result);
//    }
}









