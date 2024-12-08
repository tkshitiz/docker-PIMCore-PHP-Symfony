<?php


namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class TitleText extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Title text';
    }

    public function getDescription(): string
    {
        return 'Embed contents';
    }
    
    public function needsReload(): bool
    {
        return false;
    }
}