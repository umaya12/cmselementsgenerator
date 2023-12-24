<?php

namespace App\Helper;

class FormatConverter
{

    public function convertToTwigTags($cmsElementTechnicalName)
    {
        $result = "";
        $dataConverted = str_split($cmsElementTechnicalName);
        for ($i = 0; $i < count($dataConverted); $i++) {
            $word = $dataConverted[$i];
            if ($word == " ") {
                $result .= "";
                continue;
            }
            if ($word === "-") {
                $result .= "_";
                continue;
            }
            if (ctype_upper($word)) {
                if ($i !== 0) {
                    $result .= "_";
                }
            }
            $word = strtolower($word);
            $result .= $word;
        }
        return $result;
    }

}