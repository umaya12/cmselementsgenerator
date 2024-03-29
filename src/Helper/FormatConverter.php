<?php

namespace App\Helper;

class FormatConverter
{

    public function convertToTwigTags(string $cmsElementTechnicalName)
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

    public function removeHyphens(string $text)
    {
        $text=str_replace("-", "", $text);
        return strtolower($text);
    }

    public function convertToCamelCase(string $text,bool $firstLetterStatus)
    {
        $dataConverted = preg_split('/\s|_|-|&/', $text);
        $result = "";
        foreach ($dataConverted as $value) {
            if ($firstLetterStatus === true) {
                $result .= ucfirst($value);
            } else {
                $result .= lcfirst($value);
            }
        }
        return $result;
    }

}