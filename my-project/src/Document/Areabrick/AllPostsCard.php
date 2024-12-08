<?php


namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class AllPostsCard extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'All posts card';
    }

    public function getDescription(): string
    {
        return 'Add all posts card';
    }
    
    public function needsReload(): bool
    {
        return false;
    }
}