<?php


namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;

class Header extends AbstractTemplateAreabrick
{
    public function getName(): string
    {
        return 'Header';
    }

    public function getDescription(): string
    {
        return 'Embed contents from other URL (websites) via iframe';
    }
    
    public function needsReload(): bool
    {
        return false;
    }
}