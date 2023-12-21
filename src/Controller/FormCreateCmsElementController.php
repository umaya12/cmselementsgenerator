<?php

namespace App\Controller;

use App\Service\FolderCreation;
use App\Service\FolderStructure;
use App\Service\FormDataManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormCreateCmsElementController extends AbstractController
{

    public function __construct(
        private FormDataManager $formDataManager,
        private FolderStructure $cmsElementStructure,
        private FolderCreation $folderCreation
    ) {
    }

    #[Route('/createcmselement', name: 'form_create_cms_element')]
    public function index(Request $request): Response
    {
        // Form Data Exportieren
        $pluginTechnicalName = $request->request->get('pluginTechnicalName');
        $cmsElementFormData = $request->request->all();
        if (isset($pluginTechnicalName)) {
            $this->formDataManager->storeCmsElementFromData($cmsElementFormData);
            // get folder structor
            $structure = $this->cmsElementStructure->getCmsElementStructure();
            // create folder structor
            $this->folderCreation->createStructure($structure);
//            dump($structure);

        }

//        exit;
        return $this->render('form_create_cms_element/index.html.twig', [
            'controller_name' => 'FormCreateCmsElementController',
        ]);
    }
}









//        $pluginTechnicalName=$request->request->get('pluginTechnicalName');
//        $version=$request->request->get("version");
//        $pluginDescription=$request->request->get("pluginDescription");
//        $pluginLabelDE=$request->request->get("pluginLabelDE");
//        $pluginLabelEN=$request->request->get("pluginLabelEN");
//        $cmsTechnicalName=$request->request->get("cmsTechnicalName");
//        $cmsElementLabel=$request->request->get("cmsElementLabel");
//        $cmsDefaultPreviewImage=$request->request->get("cmsDefaultPreviewImage");
//        $cmsDefaultComponentImage=$request->request->get("cmsDefaultComponentImage");
//        $cmsPreviewImage=$request->files->get("cmsPreviewImage");
//        $cmsComponentImage=$request->files->get("cmsComponentImage");