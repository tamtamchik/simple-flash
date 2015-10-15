# Simple Flash Messages [![SensioLabsInsight](https://insight.sensiolabs.com/projects/64bbe2d0-055e-402a-8704-ea7dd6087b16/small.png)](https://insight.sensiolabs.com/projects/64bbe2d0-055e-402a-8704-ea7dd6087b16)

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Easy, framework agnostic flash notifications. Inspired by [laracasts/flash](https://github.com/laracasts/flash) and [plasticbrain/PHP-Flash-Messages](https://github.com/plasticbrain/PHP-Flash-Messages). Creates [Bootstrap](http://getbootstrap.com) friendly alert notifications.

![simple-flash](https://dl.dropboxusercontent.com/u/1285445/pub/simple-flash.png)

## Install

Via [Composer](http://getcomposer.org).

```bash
$ composer require tamtamchik/simple-flash
```

Inside your project make sure to start a session and load [Composer](http://getcomposer.org) autoload to make everything work.

````php
<?php
// Start a Session
if( !session_id() ) @session_start();

// Initialize Composer Autoload
require_once 'vendor/autoload.php';
````

> **Warning!** This library contains global `flash()` function, that potentially can break your function with this name. Now you are warned!

## Usage

There are 3 ways to use library:

```php
use \Tamtamchik\SimpleFlash\Flash;

// instance
$flash = new Flash();
$flash->message('Tea.');

// static
Flash::message('Earl Gray.');

// function
flash()->message('Hot!');
```

Messages added by calling `message($message, $type = 'info')` method. In case of calling a function `flash()` you can pass `$message, $type` just to function like so: `flash('resistance is futile')`.

Because any of creation types return `\Tamtamchik\SimpleFlash\Flash` instance, so you can always use chaining to add multiple messages. Shortcuts available for all types of base message types, also you can pass arrays as `$message`.

```php
flash()->error(['Invalid email!', 'Invalid username!'])
       ->warning('Warning message.')
       ->info('Info message.')
       ->success('Success message!');
```

Out of the box library support 4 different types of messages: `error`, `warning`, `info`, `success`. So far output is hard coded and designed for [Bootstrap](http://getbootstrap.com).

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

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email <yuri.tam.tkachenko@gmail.com> instead of using the issue tracker.

## Credits

- [Yuri Tkachenko][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/tamtamchik/simple-flash.svg?style=flat-square
[ico-license]: https://img.shields.io/packagist/l/tamtamchik/simple-flash.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/tamtamchik/simple-flash/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/tamtamchik/simple-flash.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/tamtamchik/simple-flash.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tamtamchik/simple-flash.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/tamtamchik/simple-flash
[link-travis]: https://travis-ci.org/tamtamchik/simple-flash
[link-scrutinizer]: https://scrutinizer-ci.com/g/tamtamchik/simple-flash/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/tamtamchik/simple-flash
[link-downloads]: https://packagist.org/packages/tamtamchik/simple-flash
[link-author]: https://github.com/tamtamchik
[link-contributors]: ../../contributors

[![Join the chat at https://gitter.im/tamtamchik/simple-flash](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/tamtamchik/simple-flash?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
