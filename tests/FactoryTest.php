<?php

use Tamtamchik\SimpleFlash\Templates;

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'BadTemplate.php';

class FactoryTest extends PHPUnit_Framework_TestCase
{
    private $templates = [];

    /**
     * Prepare setup before tests.
     */
    public function setUp()
    {
        $templatesReflection = new ReflectionClass('Tamtamchik\\SimpleFlash\\Templates');
        $this->templates     = $templatesReflection->getConstants();
    }

    /**
     * Base create function.
     *
     * @param $name
     */
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
        foreach ($this->templates as $template) {
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
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::BOOTSTRAP3);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Bootstrap3Template', get_class($template));
    }

    /** @test */
    public function testBootstrap4Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::BOOTSTRAP4);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Bootstrap4Template', get_class($template));
    }

    /** @test */
    public function testFoundation5Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::FOUNDATION5);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Foundation5Template', get_class($template));
    }

    /** @test */
    public function testFoundation6Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::FOUNDATION6);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Foundation6Template', get_class($template));
    }

    /** @test */
    public function testSemantic2Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::SEMANTIC2);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Semantic2Template', get_class($template));
    }

    /** @test */
    public function testUiKit2Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::UIKIT2);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Uikit2Template', get_class($template));
    }

    /** @test */
    public function testNotFoundTemplate()
    {
        try {
            \Tamtamchik\SimpleFlash\TemplateFactory::create('ABCTemplate');
        } catch (\Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException $e) {
            $this->assertContains('Template "ABCTemplate" not found!', $e->getMessage());
        }
    }
}
