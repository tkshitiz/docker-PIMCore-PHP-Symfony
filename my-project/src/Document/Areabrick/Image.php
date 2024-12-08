<?php

namespace App\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\Document;


class Image extends AbstractTemplateAreabrick implements EditableDialogBoxInterface
{
    public function getName(): string
    {
        return 'Image';
    }

    public function getDescription(): string
    {
        return 'image';
    }

    public function getEditableDialogBoxConfiguration(Document\Editable $area, ?Info $info): EditableDialogBoxConfiguration
    {
        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setReloadOnClose(true);
        $config->setItems([
            [
                'type' => 'input',
                'label' => 'Padding (Top Right Left Bottam)', // labels are optional
                'name' => 'padding'
            ],
            [
                'type' => 'input',
                'label' => 'Margin (Top Right Left Bottam)', // labels are optional
                'name' => 'margin'
            ],
        ]);

        return $config;
    }
    public function needsReload(): bool
    {
        return false;
    }
}
