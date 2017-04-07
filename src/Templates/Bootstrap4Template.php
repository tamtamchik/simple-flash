<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class Bootstrap4Template.
 * Uses default Bootstrap 4 markdown for flash messages.
 */
class Bootstrap4Template extends Bootstrap3Template implements TemplateInterface
{
    protected $prefix  = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div class="alert alert-%s" role="alert">%s</div>';
}
