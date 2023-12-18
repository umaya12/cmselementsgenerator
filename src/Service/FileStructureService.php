<?php
namespace App\Service;

class FileStructureService
{
   private $technicalName = "testing";

   public function createFiles(array $files)
   {
      foreach ($files as $path) {
         if (!file_exists($path)) {
            file_put_contents($path, $this->checkFileExtention($path));
         }
      }
   }


   public function hasExtension($path, $extension)
   {
      return strpos($path, $extension) !== false;
   }



   public function checkFileExtention($path)
   {
      if ($this->hasExtension($path, "main.js")) {
         return $this->mainJsContent();
      } else if (
         $this->hasExtension($path, "/$this->technicalName/index.js")
      ) {
         return "
         // <plugin root>/src/Resources/app/administration/src/module/sw-cms/elements/$this->technicalName/index.js
         Shopware.Service('cmsService').registerCmsElement({
             name: '$this->technicalName',
             label: 'sw-cms.elements.customDailymotionElement.label',
             component: 'sw-cms-el-dailymotion',
             configComponent: 'sw-cms-el-config-$this->technicalName/index.js',
             previewComponent: 'sw-cms-el-preview-$this->technicalName/index.js',
             defaultConfig: {
                 dailyUrl: {
                     source: 'static',
                     value: ''
                 }
             }
         });
         ";
      }
      ;
   }


   public function mainJsContent()
   {
      return "// <plugin root>/src/Resources/app/administration/src/main.js
   import './module/sw-cms/elements/dailymotion';
   ";
   }

   public function componentTwigContent()
   {
      return "// <plugin root>/src/Resources/app/administration/src/main.js
   import './module/sw-cms/elements/dailymotion';
   ";
   }
















}