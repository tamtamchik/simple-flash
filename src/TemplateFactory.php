<?php

namespace Tamtamchik\SimpleFlash;

use Tamtamchik\SimpleFlash\Templates\Bootstrap3Template;
use Tamtamchik\SimpleFlash\Templates\Foundation5Template;
use Tamtamchik\SimpleFlash\Templates\Foundation6Template;
use Tamtamchik\SimpleFlash\Templates\Semantic2Template;
use Tamtamchik\SimpleFlash\Templates\UiKit2Template;

/**
 * Class TemplateFactory.
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
            case 'uikit2':
                $result = new UiKit2Template();
                break;
            case 'semantic2':
                $result = new Semantic2Template();
                break;
            case 'foundation6':
                $result = new Foundation6Template();
                break;
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
