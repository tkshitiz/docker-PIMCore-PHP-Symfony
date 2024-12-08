<?php


namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class LatestPost extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'latest posts';
    }

    public function getDescription(): string
    {
        return 'Add latest posts';
    }
    
    public function needsReload(): bool
    {
        return false;
    }
}