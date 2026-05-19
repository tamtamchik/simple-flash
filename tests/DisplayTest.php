<?php

namespace Tamtamchik\SimpleFlash\Test;

use PHPUnit\Framework\TestCase;
use Tamtamchik\SimpleFlash\Templates;
use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;
use function Tamtamchik\SimpleFlash\flash;

@session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'BadTemplate.php';

class DisplayTest extends TestCase
{
    private $bootstrap = '<div class="alert alert-info" role="alert">Info message!<br /></div>';
    private $foundation = '<div class="callout primary"><p>Info message!</p></div>';
    private $bulma = '<div class="notification is-info">Info message!<br /></div>';
    private $tailwind = '<div class="bg-blue-300 border border-blue-400 text-blue-800 px-4 py-3 mb-3 rounded relative shadow" role="alert"">Info message!<br /></div>';
    private $primer = '<div class="flash flash-info"><p>Info message!</p></div>';
    private $uikit = '<div uk-alert class="uk-alert-primary uk-padding-small">Info message!<br /></div>';
    private $fomantic = '<div class="ui message info"><p>Info message!</p></div>';
    private $cirrus = '<div class="toast toast--info">Info message!<br /></div>';
    private $vanilla = '<div class="p-notification--information"><div class="p-notification__content"><p class="p-notification__message">Info message!<br /></p></div></div>';
    private $beercss = '<div class="blue padding round"><span>Info message!</span></div>';

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
    public function testDisplayWithFomantic()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::FOMANTIC);
        $this->assertEquals($this->fomantic, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayFomantic()
    {
        flash()->info('Info message!');

        $content = flash()->displayFomantic();
        $this->assertEquals($this->fomantic, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithCirrus()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::CIRRUS);
        $this->assertEquals($this->cirrus, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayCirrus()
    {
        flash()->info('Info message!');

        $content = flash()->displayCirrus();
        $this->assertEquals($this->cirrus, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithVanilla()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::VANILLA);
        $this->assertEquals($this->vanilla, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayVanilla()
    {
        flash()->info('Info message!');

        $content = flash()->displayVanilla();
        $this->assertEquals($this->vanilla, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayWithBeercss()
    {
        flash()->info('Info message!');

        $content = flash()->display(null, Templates::BEERCSS);
        $this->assertEquals($this->beercss, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testDisplayBeercss()
    {
        flash()->info('Info message!');

        $content = flash()->displayBeercss();
        $this->assertEquals($this->beercss, $content);
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testFomanticAllSeverities()
    {
        flash()->success('Success message!');
        $this->assertEquals('<div class="ui message success"><p>Success message!</p></div>', flash()->displayFomantic());

        flash()->info('Info message!');
        $this->assertEquals('<div class="ui message info"><p>Info message!</p></div>', flash()->displayFomantic());

        flash()->warning('Warning message!');
        $this->assertEquals('<div class="ui message warning"><p>Warning message!</p></div>', flash()->displayFomantic());

        flash()->error('Error message!');
        $this->assertEquals('<div class="ui message error"><p>Error message!</p></div>', flash()->displayFomantic());
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testCirrusAllSeverities()
    {
        flash()->success('Success message!');
        $this->assertEquals('<div class="toast toast--success">Success message!<br /></div>', flash()->displayCirrus());

        flash()->info('Info message!');
        $this->assertEquals('<div class="toast toast--info">Info message!<br /></div>', flash()->displayCirrus());

        flash()->warning('Warning message!');
        $this->assertEquals('<div class="toast toast--warning">Warning message!<br /></div>', flash()->displayCirrus());

        flash()->error('Error message!');
        $this->assertEquals('<div class="toast toast--danger">Error message!<br /></div>', flash()->displayCirrus());
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testVanillaAllSeverities()
    {
        flash()->success('Success message!');
        $this->assertEquals('<div class="p-notification--positive"><div class="p-notification__content"><p class="p-notification__message">Success message!<br /></p></div></div>', flash()->displayVanilla());

        flash()->info('Info message!');
        $this->assertEquals('<div class="p-notification--information"><div class="p-notification__content"><p class="p-notification__message">Info message!<br /></p></div></div>', flash()->displayVanilla());

        flash()->warning('Warning message!');
        $this->assertEquals('<div class="p-notification--caution"><div class="p-notification__content"><p class="p-notification__message">Warning message!<br /></p></div></div>', flash()->displayVanilla());

        flash()->error('Error message!');
        $this->assertEquals('<div class="p-notification--negative"><div class="p-notification__content"><p class="p-notification__message">Error message!<br /></p></div></div>', flash()->displayVanilla());
    }

    /**
     * @test
     * @throws FlashTemplateNotFoundException
     */
    public function testBeercssAllSeverities()
    {
        flash()->success('Success message!');
        $this->assertEquals('<div class="green padding round"><span>Success message!</span></div>', flash()->displayBeercss());

        flash()->info('Info message!');
        $this->assertEquals('<div class="blue padding round"><span>Info message!</span></div>', flash()->displayBeercss());

        flash()->warning('Warning message!');
        $this->assertEquals('<div class="amber padding round"><span>Warning message!</span></div>', flash()->displayBeercss());

        flash()->error('Error message!');
        $this->assertEquals('<div class="red padding round"><span>Error message!</span></div>', flash()->displayBeercss());
    }

}
