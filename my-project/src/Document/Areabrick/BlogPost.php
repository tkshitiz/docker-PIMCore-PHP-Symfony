<?php


namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class BlogPost extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Blogpost';
    }

    public function getDescription(): string
    {
        return 'Add Blog posts';
    }
    
    public function needsReload(): bool
    {
        return false;
    }
}