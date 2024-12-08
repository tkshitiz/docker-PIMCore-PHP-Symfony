<?php
namespace App\EventListener;
 
use Pimcore\Bundle\AdminBundle\Event\BundleManagerEvents;
use Pimcore\Event\BundleManager\PathsEvent;
 
class PimcoreAdminListener
{
    public function addCSSFiles(PathsEvent $event)
    {
        $event->setPaths(
            array_merge(
                $event->getPaths(),
                [
                    '/styles/basic.css'
                ]
            )
        );
    }
    
 
    public function addJSFiles(PathsEvent $event)
    {
        // $event->setPaths(
        //     array_merge(
        //         $event->getPaths(),
        //         [
        //             '/admin-static/js/startup.js',
        //         ]
        //     )
        // );
    }
}