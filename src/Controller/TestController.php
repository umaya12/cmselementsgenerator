<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test/{texts}', name: 'app_test')]
    public function index($texts): Response
    {

        /////////////////////////////////////
//        $result = preg_replace_callback('/(\s|-|_)([a-z])/', function ($matches) {
//            return strtoupper($matches[2]);
//        }, $text);
//        $result = ucfirst($result); // Macht den ersten Buchstaben groß
        /////////////////////////////////////
         //تمرين امحي ال_ و -  و الفراغات و حول اول حرف بعدهم الى حرف كبير
        $result="";
        $txt=preg_split('/\s|_|-|&/', $texts);
        foreach ($txt as $value){
            $result .= ucfirst($value);
        }
        dump($result);
        exit;


        return $this->render('test/index.html.twig', [
            'controller_name' => $convertToText,
        ]);
    }
}
