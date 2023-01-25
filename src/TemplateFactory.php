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
     * @param string $name - available templates see in Templates class.
     *
     * @return TemplateInterface
     * @throws FlashTemplateNotFoundException
     */
    public static function create(string $name = Templates::BASE): TemplateInterface
    {
        $class = __NAMESPACE__ . '\\Templates\\' . ucwords($name) . 'Template';

        if (class_exists($class)) {
            return new $class();
        }

        throw new FlashTemplateNotFoundException("Template \"{$name}\" not found!");
    }
}
