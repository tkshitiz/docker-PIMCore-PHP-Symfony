<?php

namespace App\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('get_css_property', [$this, 'getSpaceProperty']),
        ];
    }

    public function getSpaceProperty($element, $default)
    {
        if ($element == null) {
            return $default;
        }

        $data = $element->getData() ?? $default;

        if ("" == $data) {
            return $default;
        }

        return $data;
    }
}
