<?php


namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Posts extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Posts';
    }

    public function getDescription(): string
    {
        return 'Add Posts';
    }
    
    public function needsReload(): bool
    {
        return false;
    }
}