<?php
namespace Grav\Plugin;
use \Grav\Common\Plugin;
class CbrcurrencyPlugin extends Plugin
{
    
    protected $config;
    
    public static function getSubscribedEvents()
    {
        return [
            'onTwigExtensions' => ['onTwigExtensions', 0]
        ];
    }
    public function onTwigExtensions()
    {
        
        require_once(__DIR__ . '/classes/cbr.php');
        $this->grav['twig']->twig->addExtension(new CbrTwigExtension());
        
    }
}