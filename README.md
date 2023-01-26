# Simple Flash Messages

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![SensioLabsInsight][ico-insight]][link-insight]

Easy, framework-agnostic flash notifications for PHP. Inspired by [laracasts/flash](https://github.com/laracasts/flash) and [plasticbrain/PHP-Flash-Messages](https://github.com/plasticbrain/PHP-Flash-Messages). It supports multiple CSS frameworks out of the box:

* [Bootstrap](https://getbootstrap.com) (default)
* [Foundation](https://get.foundation)
* [Bulma](https://bulma.io)
* [Materialize](https://materializecss.com)
* [Tailwind](https://tailwindcss.com)
* [Premier](https://primer.style)
* [UIKit](https://getuikit.com)
* [Semantic UI](https://semantic-ui.com)
* [Spectre.css](https://picturepan2.github.io/spectre)
* [Halfmoon](https://www.gethalfmoon.com)

![simple-flash](https://cloud.githubusercontent.com/assets/265510/24695879/c87b32f2-1a11-11e7-972e-b4b2c75f35b5.png)

> **The documentation below is for version 3.x!**  
> **If you are looking the documentation for version 2.x look [here](https://github.com/tamtamchik/simple-flash/blob/2.0.x/README.md).**  
> **If you are looking the documentation for version 1.x look [here](https://github.com/tamtamchik/simple-flash/blob/1.2.x/README.md).**

## Install

Via [Composer](http://getcomposer.org).

```bash
$ composer require tamtamchik/simple-flash
```

Inside your project make sure to start a session and load [Composer](http://getcomposer.org) autoload to make everything work.

````php
<?php
// Start a Session
if( !session_id() ) {
    session_start();
}

// Initialize Composer Autoload
require_once 'vendor/autoload.php';
````

## Usage

There are 3 ways to use library:

```php
use \Tamtamchik\SimpleFlash\Flash;
use function Tamtamchik\SimpleFlash\flash;

// Instance
$flash = new Flash();
$flash->message('Tea.');

// Static
Flash::message('Earl Gray.');

// Function
flash()->message('Hot!');
```

Messages added by calling `message($message, $type = 'info')` method. In case of calling a function `flash()` you can pass `$message, $type` just to function like so: `flash('resistance is futile')`.

Because any of creation types return `\Tamtamchik\SimpleFlash\Flash` instance, so you can always use chaining to add multiple messages. Shortcuts available for all types of base message types, also you can pass arrays as `$message`.

```php
use function Tamtamchik\SimpleFlash\flash;

flash()->error(['Invalid email!', 'Invalid username!'])
       ->warning('Warning message.')
       ->info('Info message.')
       ->success('Success message!');
```

Out of the box library support 4 different types of messages: `error`, `warning`, `info`, `success`.

```html
<div class="alert alert-danger" role="alert">
  <p>Invalid email!</p>
  <p>Invalid username!</p>
</div>
<div class="alert alert-warning" role="alert"><p>Warning message.</p></div>
<div class="alert alert-info" role="alert"><p>Info message.</p></div>
<div class="alert alert-success" role="alert"><p>Success message!</p></div>
```

Rendering is simple:

```php
use function Tamtamchik\SimpleFlash\flash;

// Rendering specific type
$output = flash()->display('error');

// Rendering all flash
$output = flash()->display();

// Also rendering possible when you just read instance of \Tamtamchik\SimpleFlash\Flash object as a string
(string) flash();

// or ... it's totally just for display, never do this in real life...
<?php
// ... some code
$flash = new Flash();
$flash->warning('It is totally just for display, never do this in real life...');
// ... some other code
?>
<!-- ... some html -->
<div class="flashes">
  <?= $flash; ?>
</div>
<!-- ... some other html -->
```

## Templates

Using templates you can customize how flash messages will be rendered. 
Package comes with a set of templates for most popular CSS frameworks:

```php
Templates::BASE; // Same as Templates::BOOTSTRAP
Templates::BOOTSTRAP;   // https://getbootstrap.com
Templates::FOUNDATION;  // https://get.foundation
Templates::BULMA;       // https://bulma.io
Templates::MATERIALIZE; // https://materializecss.com
Templates::TAILWIND;    // https://tailwindcss.com
Templates::PRIMER;      // https://primer.style
Templates::UIKIT;       // https://getuikit.com
Templates::SEMANTIC;    // https://semantic-ui.com
Templates::SPECTRE;     // https://picturepan2.github.io/spectre
Templates::HALFMOON;    // https://www.gethalfmoon.com
```

### Shortcuts

You cah pass template name as a second argument to `display()` function:

```php
use function Tamtamchik\SimpleFlash\flash;

flash()->success('Success message!');
...
// rendering with Halfmoon template using Templates::HALFMOON as a shortcut
echo flash()->display('success', Templates::HALFMOON);
```

Or you can use descriptive display functions:

```php
use function Tamtamchik\SimpleFlash\flash;

flash()->success('Success message!');
...
echo flash()->displayBootstrap();
echo flash()->displayFoundation();
echo flash()->displayBulma();
echo flash()->displayMaterialize();
echo flash()->displayTailwind();
echo flash()->displayPrimer();
echo flash()->displayUiKit();
echo flash()->displaySemantic();
echo flash()->displaySpectre();
echo flash()->displayHalfmoon();
```

### Factory

Package comes with a set of templates for most popular CSS frameworks:

This templates can be created using [TemplateFactory](src/TemplateFactory.php) that comes with package.
All templates have aliases defined in [Templates](src/Templates.php).

```php
use Tamtamchik\SimpleFlash\Flash;
use Tamtamchik\SimpleFlash\TemplateFactory;
use Tamtamchik\SimpleFlash\Templates;

// get template from factory, e.g. template for Foundation
$template = TemplateFactory::create(Templates::FOUNDATION);

// passing template via function
flash('Info message using Foundation 6 template!', 'info', $template);

// passing to constructor
$flash = new Flash($template);

// using setTemplate function
$flash->setTemplate($template);
```

### Creating templates

Template is basically any class that implements [TemplateInterface](src/TemplateInterface.php). But to make it easy
you can extend [BaseTemplate](src/BaseTemplate.php), it already contains most of the functions.

Defining and using this sample class as template:

```php
use Tamtamchik\SimpleFlash\BaseTemplate;
use Tamtamchik\SimpleFlash\TemplateInterface;
use function Tamtamchik\SimpleFlash\flash;

class CustomTemplate extends BaseTemplate implements TemplateInterface
{
    protected $prefix  = '<li>'; // every line prefix
    protected $postfix = '</li>'; // every line postfix
    protected $wrapper = '<ul class="alert-%s">%s</ul>'; // wrapper over messages of same type

    /**
     * @param $messages - message text
     * @param $type     - message type: success, info, warning, error
     *
     * @return string
     */
    public function wrapMessages($messages, $type)
    {
        return sprintf($this->getWrapper(), $type, $messages);
    }
}

flash()
    ->setTemplate(new CustomTemplate)
    ->error(['Invalid email!', 'Invalid username!'])
    ->warning('Warning message.')
    ->info('Info message.')
    ->success('Success message!')
    ->display();
```

Will output following:

```html
<ul class="alert-error">
    <li>Invalid email!</li>
    <li>Invalid username!</li>
</ul>
<ul class="alert-warning">
    <li>Warning message.</li>
</ul>
<ul class="alert-info">
    <li>Info message.</li>
</ul>
<ul class="alert-success">
    <li>Success message!</li>
</ul>
```

## Interface

Package provides `TemplateInterface` for Simple Flash templates.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer tests
```

## Examples

``` bash
$ composer examples
```
And then just visit [http://localhost:8000](http://localhost:8000)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email <yuri.tam.tkachenko@gmail.com> instead of using the issue tracker.

## Credits

- [Yuri Tkachenko][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[![Buy Me A Coffee][ico-coffee]][link-coffee]

[ico-version]: https://img.shields.io/packagist/v/tamtamchik/simple-flash.svg?style=flat-square
[ico-license]: https://img.shields.io/packagist/l/tamtamchik/simple-flash.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/tamtamchik/simple-flash/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/tamtamchik/simple-flash.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/tamtamchik/simple-flash.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tamtamchik/simple-flash.svg?style=flat-square
[ico-coffee]: https://img.shields.io/badge/Buy%20Me%20A-Coffee-%236F4E37.svg?style=flat-square
[ico-insight]: https://img.shields.io/symfony/i/grade/a92cacf2-ba32-4f36-b040-5a9f1d7f8f25.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/tamtamchik/simple-flash
[link-travis]: https://app.travis-ci.com/github/tamtamchik/simple-flash
[link-scrutinizer]: https://scrutinizer-ci.com/g/tamtamchik/simple-flash/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/tamtamchik/simple-flash
[link-downloads]: https://packagist.org/packages/tamtamchik/simple-flash
[link-author]: https://github.com/tamtamchik
[link-contributors]: ../../contributors
[link-coffee]: https://www.buymeacoffee.com/tamtamchik
[link-insight]: https://insight.symfony.com/projects/a92cacf2-ba32-4f36-b040-5a9f1d7f8f25
