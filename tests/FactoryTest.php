<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'BadTemplate.php';

class FactoryTest extends PHPUnit_Framework_TestCase
{
    private $templates = ['bootstrap3', 'foundation5', 'foundation6', 'semantic2'];

    private function _testTemplate($name)
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create($name);

        $flash = new \Tamtamchik\SimpleFlash\Flash();

        $flash->setTemplate($template);

        $msg  = $template->wrapMessage('Testing templates');
        $text = $template->wrapMessages($msg, 'info');

        $content = $flash->info('Testing templates')->display();

        $this->assertContains($text, $content);

        unset($flash);
    }

    /** @test */
    public function testTemplates()
    {
        $templates = $this->templates;
        array_push($templates, null); //need to reset to default after tests

        foreach ($templates as $template) {
            $this->_testTemplate($template);
        }
    }

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
    public function testFoundation5Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create('foundation5');
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Foundation5Template', get_class($template));
    }

    /** @test */
    public function testFoundation6Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create('foundation6');
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Foundation6Template', get_class($template));
    }

    /** @test */
    public function testSemantic2Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create('semantic2');
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Semantic2Template', get_class($template));
    }
}
