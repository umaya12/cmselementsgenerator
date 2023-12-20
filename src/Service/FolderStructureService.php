<?php
namespace App\Service;

use Psr\Log\LoggerInterface;

class FolderStructureService
{
   private LoggerInterface $logger;

   public function __construct(LoggerInterface $logger)
   {
      $this->logger = $logger;
   }

   public function createStructure(array $structure): array
   {
      $status = [];
      foreach ($structure as $path) {
         $dir = dirname($path);
         if (!is_dir($dir)) {
            ;
            mkdir($dir, 0777, true);
            $status[$path] = "Verzeichnis angelegt";
         } else {
            $status[$path] = "Verzeichnis existiert bereits";
         }
      }

      // Loggen der Statusmeldungen
      foreach ($status as $path => $message) {
         $this->logger->info("Pfad: {$path}, Status: {$message}");
      }

      return $status;
   }
}
