<?php

namespace App\Controller;

use App\Service\FileStructureService;
use App\Service\CmsElementFolderStructure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestingController extends AbstractController
{

    public function __construct()
    {
    }

    #[Route('/testing', name: 'app_testing')]
    public function index(Request $reqeust): Response
    {
        //! Struktur Folders anlegen
        $rootDir = $this->getParameter('output_folder');
        $cmsElementName = "testing";
        $data = $reqeust->query->all();
        $toArra = json_encode($data, true);
        $name = $reqeust->query;
        if (isset($data['rows'])) {
            dump($data['rows']);
        }
        // exit;
        $elementName = "elementName";
        // $structure = [
        //     "$rootDir/src/Resources/views/storefront/element/cms-element-$elementName.html.twig",
        //     "$rootDir/src/Resources/app/administration/src/main.js",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/snippet/de-DE.json",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/snippet/en-GB.json",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/elements/$elementName/index.js",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/elements/$elementName/preview/index.js",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/elements/$elementName/preview/sw-cms-el-preview-$elementName.html.twig",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/elements/$elementName/preview/sw-cms-el-preview-$elementName.scss",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/elements/$elementName/elements/index.js",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/elements/$elementName/elements/sw-cms-el-$elementName.html.twig",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/elements/$elementName/elements/sw-cms-el-$elementName.scss",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/block/$elementName/config/sw-cms-block-config-$elementName.html.twig",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/elements/$elementName/config/index.js",
        //     "$rootDir/src/Resources/app/administration/src/module/sw-cms/elements/$elementName/config/sw-cms-el-config-$elementName.html.twig",
        // ];
        ////////////////////////////
        // dump();
        // exit;
        // foreach ($structure as $path) {
        //     //قم بجلب فقط مسار المجلدات , بدون الملفات التي لها لاحقة
        //     $dir = dirname($path);
        //     // dump($path);
        //     // dump($dir);
        //             // Überprüft, ob das Verzeichnis existiert. Falls nicht, wird es erstellt.
        // // '0777' sind die Berechtigungen für das Verzeichnis, 'true' aktiviert die rekursive Erstellung.
        //      if (!is_dir($dir)) {
        //          mkdir($dir, 0777, true);
        //      }
        // // Überprüft, ob die Datei existiert. Falls nicht, wird eine leere Datei erstellt.
        // if (!file_exists($path)) {
        //     file_put_contents($path, '');
        // }
        // }
        // exit;
        // foreach ($structure as $path) {
        //     $dir = dirname($path);
        //     if (!is_dir($dir)) {
        //         mkdir($dir, 0777, true);
        //     }
        //     if (!file_exists($path)) {
        //         file_put_contents($path, 'lorem Lorem Lorem');
        //     }
        // }
//////////////////////////
        // $temp = "$rootDir/src/index.js";
        // $dir = dirname($temp);
        // // dump($temp);
        // // dump($dir);
        // // exit;
        // if (!is_dir($dir)) {
        //     mkdir($dir, 0777, true);
        // }
        // if (!file_exists($temp)) {
        //     file_put_contents($temp, "Hallo");
        // }
        return $this->render('testing/index.html.twig', [
            'controller_name' => 'created',
        ]);
    }
}
