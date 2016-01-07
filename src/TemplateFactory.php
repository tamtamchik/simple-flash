<?php

namespace Tamtamchik\SimpleFlash;

use Tamtamchik\SimpleFlash\Templates\Bootstrap3Template;

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
        $result = new Bootstrap3Template();

        $className = __NAMESPACE__ . '\\Templates\\' . ucwords($name) . 'Template';

        if (class_exists($className)) {
            $result = new $className();
        }

        return $result;
    }
}
