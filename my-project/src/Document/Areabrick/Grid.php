<?php

namespace  App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;

class Grid extends AbstractTemplateAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Grid';
    }

    public function getDescription(): string
    {
        return 'grid for page';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {   
        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setReloadOnClose(true);
        //$config->setReloadOnClose(true);
        $config->setItems([
            [
                'type' => 'input',
                'label' => 'Number of rows', // labels are optional
                'name' => 'rows'
            ],
            [
                'type' => 'select',
                'label' => 'Number of columns', // labels are optional
                'name' => 'columns',
                'config' => [
                    'store' => [
                        ['1', 1],
                        ['2', 2],
                        ['4', 4],
                    ]
                ]
            ],
        ]);

        return $config;
    }
    public function needsReload(): bool
    {
        return false;
    }
}
