<?php

use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;
use Tamtamchik\SimpleFlash\Flash;
use Tamtamchik\SimpleFlash\TemplateFactory;
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
        $this->templates = $templatesReflection->getConstants();
    }

    /**
     * Base create function.
     *
     * @param $name
     * @throws FlashTemplateNotFoundException
     */
    private function _testTemplate($name)
    {
        $template = TemplateFactory::create($name);

        $flash = new Flash();

        $flash->setTemplate($template);

        $msg = $template->wrapMessage('Testing templates');
        $text = $template->wrapMessages($msg, 'info');

        $content = $flash->info('Testing templates')->display();

        $this->assertContains($text, $content);

        unset($flash);
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testTemplates()
    {
        foreach ($this->templates as $template) {
            $this->_testTemplate($template);
        }
        $this->_testTemplate(Templates::BASE);
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDefaultTemplate()
    {
        $template = TemplateFactory::create();
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\BootstrapTemplate', get_class($template));
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testBootstrapTemplate()
    {
        $template = TemplateFactory::create(Templates::BOOTSTRAP);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\BootstrapTemplate', get_class($template));
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testFoundationTemplate()
    {
        $template = TemplateFactory::create(Templates::FOUNDATION);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\FoundationTemplate', get_class($template));
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testSemanticTemplate()
    {
        $template = TemplateFactory::create(Templates::SEMANTIC);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\SemanticTemplate', get_class($template));
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testUiKitTemplate()
    {
        $template = TemplateFactory::create(Templates::UIKIT);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\UikitTemplate', get_class($template));
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testSiimpleTemplate()
    {
        $template = TemplateFactory::create(Templates::SIIMPLE);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\SiimpleTemplate', get_class($template));
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testBulmaTemplate()
    {
        $template = TemplateFactory::create(Templates::BULMA);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\BulmaTemplate', get_class($template));
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testMaterializeTemplate()
    {
        $template = TemplateFactory::create(Templates::MATERIALIZE);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\MaterializeTemplate', get_class($template));
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testSpectreTemplate()
    {
        $template = TemplateFactory::create(Templates::SPECTRE);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\SpectreTemplate', get_class($template));
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testTailwindTemplate()
    {
        $template = TemplateFactory::create(Templates::TAILWIND);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\TailwindTemplate', get_class($template));
    }

    /** @test
     * @throws FlashTemplateNotFoundException
     */
    public function testPrimerTemplate()
    {
        $template = TemplateFactory::create(Templates::PRIMER);
        $this->assertEquals('Tamtamchik\SimpleFlash\Templates\PrimerTemplate', get_class($template));
    }

    /** @test */
    public function testNotFoundTemplate()
    {
        try {
            TemplateFactory::create('ABCTemplate');
        } catch (FlashTemplateNotFoundException $e) {
            $this->assertContains('Template "ABCTemplate" not found!', $e->getMessage());
        }
    }
}
