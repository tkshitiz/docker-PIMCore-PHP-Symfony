<?php

namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;


class MyPassion extends AbstractTemplateAreabrick
{
    
    public function getName(): string
    {
        return 'MyPassion';
    }

    public function getDescription(): string
    {
        return 'Add MyPassion Page';
    }
    
    public function needsReload(): bool
    {
        return false;
    }


}
