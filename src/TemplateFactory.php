<?php

namespace Tamtamchik\SimpleFlash;

use Tamtamchik\SimpleFlash\Templates\Bootstrap3Template;
use Tamtamchik\SimpleFlash\Templates\Foundation5Template;

/**
 * Class TemplateFactory
 */
class TemplateFactory
{
    /**
     * Return template from available list of templates.
     *
     * @param string $name - available templates: bootstrap3, foundation5
     *
     * @return TemplateInterface
     */
    public static function create($name = 'bootstrap3')
    {
        switch ($name) {
            case 'foundation5':
                $result = new Foundation5Template();
                break;
            case 'bootstrap3':
            default:
                $result = new Bootstrap3Template();
        }

        return $result;
    }
}
