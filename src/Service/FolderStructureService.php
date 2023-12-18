<?php
namespace App\Service;

use App\Controller\TestingController;


class FolderStructureService
{

   public function __construct()
   {

   }




   public function createStructure(array $structure): bool
   {
      $status = false;
      foreach ($structure as $path) {
         $dir = dirname($path);
         if (!is_dir($dir)) {
            mkdir($dir, 07777, true);
            $status = true;
         }
      }
      return $status;
   }


}