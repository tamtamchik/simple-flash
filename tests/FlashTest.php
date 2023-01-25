<?php

namespace Tamtamchik\SimpleFlash\Test;

use PHPUnit\Framework\TestCase;
use Tamtamchik\SimpleFlash\Exceptions\FlashSingletonException;
use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateException;
use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;
use Tamtamchik\SimpleFlash\Flash;
use Tamtamchik\SimpleFlash\TemplateFactory;
use Tamtamchik\SimpleFlash\Templates;

@session_start();

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'BadTemplate.php';

class FlashTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        flash()->clear();
    }

    /** @test */
    public function testStaticCall()
    {
        Flash::message('Static message');

        $this->assertNotEmpty(Flash::display());
    }

    /** @test */
    public function testCreation()
    {
        $flash = new Flash();

        $this->assertFalse($flash->some());
        $this->assertEquals('Tamtamchik\SimpleFlash\Flash', get_class($flash));
    }

    /** @test */
    public function testFunction()
    {
        try {
            $flash = flash();

            $this->assertFalse($flash->some());
            $this->assertEquals('Tamtamchik\SimpleFlash\Flash', get_class($flash));
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testMessageWorkflow()
    {
        try {
            $flash = flash('Test info message');

            $this->assertTrue($flash->some());
            $this->assertStringContainsString('Test info message', $flash->display());
            $this->assertFalse($flash->some());
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testFunctionMessageType()
    {
        try {
            $flash = flash('Test info message', 'success');

            $this->assertStringContainsString('success', $flash->display());
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testChaining()
    {
        try {
            $flash = flash()->message('Test info message 1')->message('Test info message 2');

            $content = $flash->display();
            $this->assertStringContainsString('Test info message 1', $content);
            $this->assertStringContainsString('Test info message 2', $content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testInfoDefaultMessage()
    {
        try {
            $flash = flash('Test info message');

            $this->assertStringContainsString('info', $flash->display());
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testMessageTypes()
    {
        try {
            $flash = flash()
                ->message('Dummy 1', 'success')
                ->message('Dummy 2', 'info')
                ->message('Dummy 2', 'warning')
                ->message('Dummy 2', 'error');

            $content = $flash->display();
            $this->assertStringContainsString('success', $content);
            $this->assertStringContainsString('info', $content);
            $this->assertStringContainsString('success', $content);
            $this->assertStringContainsString('danger', $content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testPartialDisplay()
    {
        try {
            $flash = flash()->message('Dummy 1', 'success')->message('Dummy 2');

            $this->assertTrue($flash->some('success'));

            $content = $flash->display('success');
            $this->assertStringContainsString('Dummy 1', $content);
            $this->assertStringNotContainsString('Dummy 2', $content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testWrongDisplays()
    {
        try {
            $flash = flash()->message('Dummy 1', 'success')->message('Dummy 2');

            $this->assertFalse($flash->some('wrong'));

            $content = $flash->display('wrong');
            $this->assertEmpty($content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testAccessAsString()
    {
        $flash = new Flash();
        $flash->clear();
        $flash->message('Test message');

        $this->assertStringContainsString('Test message', "$flash");
    }

    /** @test */
    public function testWrongMessageType()
    {
        try {
            $flash = flash();
            $flash->message('Test message', 'bad');

            $this->assertFalse(flash()->some());
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testThatSessionIsShared()
    {
        try {
            flash('Checking shared');

            $content = flash()->display();
            $this->assertStringContainsString('Checking shared', $content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testItFlushesChanges()
    {
        try {
            flash('First one', 'success')->message('Other one', 'info')->display();
            flash('Third one', 'error')->display();

            $this->assertFalse(flash()->some());
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testClearFunction()
    {
        try {
            flash('I\'ll never see this message', 'success');
            flash()->clear();

            $this->assertFalse(flash()->some());
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testShortcuts()
    {
        try {
            flash()->error('Info message')->warning('Info message')->info('Info message')->success('Info message');

            $content = flash()->display();
            $this->assertStringContainsString('danger', $content);
            $this->assertStringContainsString('warning', $content);
            $this->assertStringContainsString('info', $content);
            $this->assertStringContainsString('success', $content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testToString()
    {
        try {
            flash('Testing toString', 'success');
            $flash1 = new Flash();

            $this->assertStringContainsString('toString', (string)$flash1);

            flash('Testing toString', 'success');
            $flash2 = flash();

            $this->assertStringContainsString('toString', (string)$flash2);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testEmptyFunction()
    {
        try {
            flash();

            $this->assertFalse(flash()->some());
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testWorkWithArrays()
    {
        $errors = [
            'Invalid name',
            'Invalid email',
        ];

        try {
            flash($errors, 'error');

            $content = flash()->display();
            $this->assertStringContainsString('Invalid name', $content);
            $this->assertStringContainsString('Invalid email', $content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testDefaultTemplate()
    {
        try {
            $template = TemplateFactory::create();
            $prefix = $template->getPrefix();
            $postfix = $template->getPostfix();
            $template->setPrefix('');
            $template->setPostfix('');
            $template->setWrapper('<div class="flash flash-%s" role="alert">%s</div>');

            $flash = new Flash();
            $contentOriginal = $flash->info('Testing templates')->display();
            $flash->setTemplate($template);

            $content = $flash->info('Testing templates')->display();
            $this->assertEquals('', $prefix);
            $this->assertNotEquals($contentOriginal, $content);
            $this->assertStringContainsString('Testing templates', $content);
            $this->assertStringNotContainsString($postfix, $content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testClassWithTemplateConstructor()
    {
        try {
            $template = TemplateFactory::create(Templates::FOUNDATION);
            $flash = new Flash($template);

            $flash->info('Testing templates');

            $content = $flash->display();
            $this->assertStringContainsString('callout', $content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testFunctionWithTemplateConstructor()
    {
        try {
            $template = TemplateFactory::create(Templates::FOUNDATION);

            flash('Testing templates', 'info', $template);

            $content = flash()->display();
            $this->assertStringContainsString('callout', $content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testSetTemplateFunction()
    {
        try {
            $template = TemplateFactory::create(Templates::FOUNDATION);
            $flash = new Flash();

            $flash->info('Testing templates');

            $content = $flash->setTemplate($template)->display();
            $this->assertStringContainsString('callout', $content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testGetTemplate()
    {
        $flash = new Flash();
        $flash->getTemplate()->setPrefix('AAAAAAAA')->setPostfix('BBBBBBBB');

        $flash->info('Testing templates');

        $content = $flash->display();
        $this->assertStringContainsString('AAAAAAAA', $content);
        $this->assertStringContainsString('BBBBBBBB', $content);
    }

    /** @test */
    public function testStaticMethods()
    {
        try {
            Flash::setTemplate(TemplateFactory::create());

            Flash::info('Testing static');

            $content = Flash::display();
            $this->assertStringContainsString('Testing static', $content);
        } catch (FlashTemplateNotFoundException $e) {
            $this->fail(); // should fail the test
        }
    }

    /** @test */
    public function testCloneRestriction()
    {
        $flash = new Flash();
        $reflection = new \ReflectionClass($flash);

        $this->assertFalse($reflection->isCloneable());
    }

    /**
     * @test
     * @noinspection PhpRedundantCatchClauseInspection
     */
    public function testNotSerializable()
    {
        $flash = new Flash();

        try {
            serialize($flash);
        } catch (FlashSingletonException $e) {
            $this->assertStringContainsString('Serialization of Flash is not allowed!', $e->getMessage());
        }
    }

    /**
     * Need to be last - because spoils template.
     *
     * @test
     * @noinspection PhpRedundantCatchClauseInspection
     */
    public function testBadTemplate()
    {
        try {
            $template = new BadTemplate();
            $flash = new Flash();

            $flash->info('Testing templates');
            $flash->setTemplate($template)->display();
        } catch (FlashTemplateException $e) {
            $this->assertStringContainsString('Please, make sure you have prefix, postfix and wrapper defined!', $e->getMessage());
        }
    }
}
