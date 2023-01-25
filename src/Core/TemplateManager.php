<?php

namespace Tamtamchik\SimpleFlash\Core;

use Tamtamchik\SimpleFlash\TemplateInterface;

class TemplateManager extends SessionManager
{
    /**
     * @var TemplateInterface
     */
    private $template;

    public function __construct(TemplateInterface $template)
    {
        parent::__construct();

        $this->template = $template;
    }

    /**
     * Getter for $template.
     *
     * @return TemplateInterface
     */
    protected function _getTemplate(): ?TemplateInterface
    {
        return $this->template;
    }

    /**
     * Setter for $template.
     *
     * @param TemplateInterface $template
     */
    protected function _setTemplate(TemplateInterface $template)
    {
        $this->template = $template;
    }
}
