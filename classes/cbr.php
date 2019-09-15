<?php

namespace Grav\Plugin;

class CbrTwigExtension extends \Twig_Extension
{
    
    public function getName()
    {
        return 'CbrTwigExtension';
    }
    
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('cbr', [$this, 'CbrFunction'])
        ];
    }
    
    public function CbrFunction()
    {
        
        $content = simplexml_load_file("https://www.cbr.ru/scripts/XML_daily.asp");
        
        foreach($content->Valute as $cur) {
            
            $cbrnum = (string) $cur->NumCode;
            $cbrcode = (string) $cur->CharCode;
            $cbrname = (string) $cur->Name;
            $cbrval = (string) $cur->Value;
                
            $curs[$cbrcode] = 
                [
                    "NumCode" => $cbrnum,
                    "CharCode" => $cbrcode,
                    "Name" => $cbrname,
                    "Value" => $cbrval
                ];
            
        }
        
        return $curs;
        
    }

}

