<?php

namespace Tamtamchik\SimpleFlash\Templates;

use Tamtamchik\SimpleFlash\TemplateInterface;

/**
 * Class BulmaTemplate.
 * Uses default Bulma markdown for flash messages.
 */
class BulmaTemplate extends Bootstrap3Template implements TemplateInterface
{
    protected $prefix  = '';
    protected $postfix = '<br />';
    protected $wrapper = '<div class="notification is-%s">%s</div>';
}
