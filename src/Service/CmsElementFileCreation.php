<?php
// src/Service/CmsElementFileCreation.php.php
namespace App\Service;

use App\Interface\FileCreatorInterface;

class CmsElementFileCreation
{
    private $fileCreators;

    public function __construct(array $fileCreators)
    {
        /*
        هيك النتيحة
        Array ( [0] => App\Service\CreateMainJs Object ( ) ) main.js wurde erstellt
        هنا تم عمل انتيالايز من االسيرفس من الانتر فيس وتم جلبه هنا ليتم معرفة من قام بوراثة الانترفيس

        */
        $this->fileCreators = $fileCreators;
//        $this->fileCreators =[['App\Service\CreateMainJs'],['App\Service\CreateMainJs']];
        // print_r($fileCreators);
//        exit;
    }

    public function createFile(string $path): void
    {
        foreach ($this->fileCreators as $fileCreator) {
            //اجلب كافة الكلاسات يلي وراثة Interface
            if ($fileCreator instanceof FileCreatorInterface) {
            // dump($fileCreator);
            // exit;
                // افحص اذا وراثة بالفعل فابعتلها للفانكشن يلي فيها createFile الباث تبع المجلد المطلوب انشاءه
            $fileCreator->createFile($path);
            }
        }
    }
}
