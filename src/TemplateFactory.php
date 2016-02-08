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
     * @param string $name - available templates: bootstrap3, bootstrap4, foundation5, foundation6, semantic2, uikit2
     *
     * @return TemplateInterface
     */
    public static function create($name = Templates::BOOTSTRAP3_TEMPLATE)
    {
        $result = new Bootstrap3Template();

        $className = __NAMESPACE__ . '\\Templates\\' . ucwords($name) . 'Template';

        if (class_exists($className)) {
            $result = new $className();
        }

        return $result;
    }
}
