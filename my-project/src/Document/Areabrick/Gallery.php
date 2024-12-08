<?php


namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Gallery extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Gallery';
    }

    public function getDescription(): string
    {
        return 'Add Gallery';
    }
    
    public function needsReload(): bool
    {
        return false;
    }
}