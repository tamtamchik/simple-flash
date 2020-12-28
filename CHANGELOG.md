# Changelog

All Notable changes to `tamtamchik/simple-flash` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## 2.0.1 - 2020-12-28

### Added

* PHP 8 support.

## 2.0.0 - 2020-03-11

### **Breaking Change!**

* Only latest versions of the frameworks are now supported.
* Discontinued support for:
    * Bootstrap 3
    * Foundation 5
    * UIKit 2
    * Siimple 1 & Siimple 2
* `Templates::BASE` now points to `Templates::BOOTSTRAP` (version 4).
* Renamed presets:
    * `Templates::BOOTSTRAP_4` &rarr; `Templates::BOOTSTRAP`
    * `Templates::FOUNDATION_6` &rarr; `Templates::FOUNDATION`
    * `Templates::UIKIT_3` &rarr; `Templates::UIKIT`
    * `Templates::SEMANTIC_2` &rarr; `Templates::SEMANTIC`
    * `Templates::SIIMPLE_3` &rarr; `Templates::SIIMPLE`
* Renamed classes:
    * `src/Templates/Bootstrap4Template.php` &rarr; `src/Templates/BootstrapTemplate.php`
    * `src/Templates/Foundation6Template.php` &rarr; `src/Templates/FoundationTemplate.php`
    * `src/Templates/Semantic2Template.php` &rarr; `src/Templates/SemanticTemplate.php`
    * `src/Templates/Uikit3Template.php` &rarr; `src/Templates/UikitTemplate.php`
    * `src/Templates/Siimple3Template.php` &rarr; `src/Templates/SiimpleTemplate.php`
* Removed classes:
    * `src/Templates/Bootstrap3Template.php`
    * `src/Templates/Foundation5Template.php`
    * `src/Templates/Uikit2Template.php`
    * `src/Templates/Siimple2Template.php`
    * `src/Templates/SiimpleTemplate.php`

### Changed

* All framework templates updated to be compatible with latest versions of frameworks.

### Added

* [Premier](https://primer.style)

## 1.2.5 - 2018-09-04

### Added
- [Materialize](https://materializecss.com) alerts added.
- [Spectre.css](https://picturepan2.github.io/spectre) alerts added.
- [Tailwind](https://tailwindcss.com) alerts added.

## 1.2.4 - 2017-04-05

### Added
- [Siimple 2](http://siimple.github.io) alerts added.
- [UIKit 3](http://getuikit.com) alerts added.

## 1.2.3 - 2016-12-21

### Added
- [Bulma](http://bulma.io) alerts added.

## 1.2.2 - 2016-05-10

### Fixed
- Bootstrap template fixed.

## 1.2.1 - 2016-04-25

### Added
- [Siimple](http://siimple.github.io) alerts added.

## 1.2.0 - 2016-03-19

### Changed
- Removed `FlashInterface`. It was causing troubles.

## 1.1.2 - 2016-03-31

### Changed
- Removed `FlashInterface`. It was causing troubles.

## 1.1.1 - 2016-03-14

### Added
- `FlashInterface`

## 1.1.0 - 2016-03-13

### Added
- Templates

## 1.0.1 - 2015-12-20

### Fixed
- Don't allow instantiation

## 1.0.0 - 2015-08-14

### Added
- Bumped version to 1.0.0

## 0.4.2 - 2015-05-30

### Added
- Support for array as `$message` variable.

## 0.4.1 - 2015-05-29

### Fixed
- Singleton instance.
- Empty `$message` bug.

## 0.4.0 - 2015-05-28

### Added
- New namespace `\Tamtamchik\SimpleFlash\Flash`.

### Deprecated
- Old namespace `\Tamtamchik\Flash\Flash`.

## 0.3.2 - 2015-05-28

### Added
- Initial version
