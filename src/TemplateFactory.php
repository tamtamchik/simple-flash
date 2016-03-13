<?php

namespace Tamtamchik\SimpleFlash;

use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;

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
     * @throws FlashTemplateNotFoundException
     */
    public static function create($name = Templates::BASE)
    {
        $class = __NAMESPACE__ . '\\Templates\\' . ucwords($name) . 'Template';

        if (class_exists($class)) {
            return new $class();
        }

        throw new FlashTemplateNotFoundException("Template \"{$name}\" not found!");
    }
}
