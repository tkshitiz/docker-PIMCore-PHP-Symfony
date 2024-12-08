<?php


namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class GalleryAlbumCollection extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'GalleryAlbumCollection';
    }

    public function getDescription(): string
    {
        return 'Add GalleryAlbumCollection';
    }
    
    public function needsReload(): bool
    {
        return false;
    }
}