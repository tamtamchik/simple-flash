<?php

use Tamtamchik\SimpleFlash\Templates;

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'BadTemplate.php';

class FactoryTest extends PHPUnit_Framework_TestCase
{
    private $templates = [];

    /**
     * Prepare setup before tests.
     * @throws ReflectionException
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
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
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

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testTemplates()
    {
        foreach ($this->templates as $template) {
            $this->_testTemplate($template);
        }
        $this->_testTemplate(Templates::BASE);
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testDefaultTemplate()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create();
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Bootstrap3Template', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testBootstrap3Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::BOOTSTRAP_3);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Bootstrap3Template', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testBootstrap4Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::BOOTSTRAP_4);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Bootstrap4Template', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testFoundation5Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::FOUNDATION_5);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Foundation5Template', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testFoundation6Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::FOUNDATION_6);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Foundation6Template', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testSemantic2Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::SEMANTIC_2);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Semantic2Template', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testUiKit2Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::UIKIT_2);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Uikit2Template', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testUiKit3Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::UIKIT_3);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Uikit3Template', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testSiimpleTemplate()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::SIIMPLE);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\SiimpleTemplate', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testSiimple2Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::SIIMPLE_2);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Siimple2Template', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testSiimple3Template()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::SIIMPLE_3);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\Siimple3Template', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testBulmaTemplate()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::BULMA);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\BulmaTemplate', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testMaterializeTemplate()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::MATERIALIZE);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\MaterializeTemplate', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testSpectreTemplate()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::SPECTRE);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\SpectreTemplate', get_class($template));
    }

    /** @test
     * @throws \Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException
     */
    public function testTailwindTemplate()
    {
        $template = \Tamtamchik\SimpleFlash\TemplateFactory::create(Templates::TAILWIND);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\TailwindTemplate', get_class($template));
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
