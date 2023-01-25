<?php

namespace Tamtamchik\SimpleFlash\Test;

use PHPUnit\Framework\TestCase;
use Tamtamchik\SimpleFlash\Templates;
use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;

@session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'BadTemplate.php';

class DisplayTest extends TestCase
{
    private $bootstrap = '<div class="alert alert-info" role="alert">Info message!<br /></div>';
    private $foundation = '<div class="callout primary"><p>Info message!</p></div>';
    private $bulma = '<div class="notification is-info">Info message!<br /></div>';
    private $materialize = '<div class="card-panel blue lighten-4 blue-text text-darken-4"><div>Info message!</div></div>';
    private $tailwind = '<div class="bg-blue-300 border border-blue-400 text-blue-800 px-4 py-3 mb-3 rounded relative shadow" role="alert"">Info message!<br /></div>';
    private $primer = '<div class="flash flash-info"><p>Info message!</p></div>';
    private $uikit = '<div uk-alert class="uk-alert-primary"><p>Info message!</p></div>';
    private $semantic = '<div class="ui message info"><p>Info message!</p></div>';
    private $spectre = '<div class="toast toast-primary">Info message!<br /></div>';

    /**
     * @throws FlashTemplateNotFoundException
     */
    public static function setUpBeforeClass(): void
    {
        flash()->clear();
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplay()
    {
        flash()->info('Info message!');

        $content = flash()->display();
        $this->assertEquals($this->bootstrap, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithBootstrap()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::BOOTSTRAP);
        $this->assertEquals($this->bootstrap, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayBootstrap()
    {
        flash()->info('Info message!');

        $content = flash()->displayBootstrap();
        $this->assertEquals($this->bootstrap, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithFoundation()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::FOUNDATION);
        $this->assertEquals($this->foundation, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayFoundation()
    {
        flash()->info('Info message!');

        $content = flash()->displayFoundation();
        $this->assertEquals($this->foundation, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithBulma()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::BULMA);
        $this->assertEquals($this->bulma, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayBulma()
    {
        flash()->info('Info message!');

        $content = flash()->displayBulma();
        $this->assertEquals($this->bulma, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithMaterialize()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::MATERIALIZE);
        $this->assertEquals($this->materialize, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayMaterialize()
    {
        flash()->info('Info message!');

        $content = flash()->displayMaterialize();
        $this->assertEquals($this->materialize, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithTailwind()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::TAILWIND);
        $this->assertEquals($this->tailwind, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayTailwind()
    {
        flash()->info('Info message!');

        $content = flash()->displayTailwind();
        $this->assertEquals($this->tailwind, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithPrimer()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::PRIMER);
        $this->assertEquals($this->primer, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayPrimer()
    {
        flash()->info('Info message!');

        $content = flash()->displayPrimer();
        $this->assertEquals($this->primer, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithUiKit()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::UIKIT);
        $this->assertEquals($this->uikit, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayUiKit()
    {
        flash()->info('Info message!');

        $content = flash()->displayUiKit();
        $this->assertEquals($this->uikit, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithSemantic()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::SEMANTIC);
        $this->assertEquals($this->semantic, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplaySemantic()
    {
        flash()->info('Info message!');

        $content = flash()->displaySemantic();
        $this->assertEquals($this->semantic, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithSpectre()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::SPECTRE);
        $this->assertEquals($this->spectre, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplaySpectre()
    {
        flash()->info('Info message!');

        $content = flash()->displaySpectre();
        $this->assertEquals($this->spectre, $content);
    }

}
