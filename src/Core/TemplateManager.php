<?php

namespace Tamtamchik\SimpleFlash\Core;

use Tamtamchik\SimpleFlash\TemplateInterface;

class TemplateManager
{
    /**
     * @var TemplateInterface
     */
    private $template;

    public function __construct(TemplateInterface $template)
    {
        $this->template = $template;
    }

    /**
     * Getter for $template.
     *
     * @return TemplateInterface
     */
    public function getTemplate(): TemplateInterface
    {
        return $this->template;
    }

    /**
     * Setter for $template.
     *
     * @param TemplateInterface $template
     */
    public function setTemplate(TemplateInterface $template): void
    {
        $this->template = $template;
    }
}
