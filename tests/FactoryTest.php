<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'BadTemplate.php';

class FactoryTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function testDefaultTemplate()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create();
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Bootstrap3Template', get_class($template));
    }

    /** @test */
    public function testBootstrap3Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create('bootstrap3');
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Bootstrap3Template', get_class($template));
    }

    /** @test */
    public function testFoundationTemplate()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create('foundation5');
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Foundation5Template', get_class($template));
    }
}
