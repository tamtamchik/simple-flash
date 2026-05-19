# Changelog

All Notable changes to `tamtamchik/simple-flash` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## 4.0.0 - 2026-05-19

**Breaking Changes!**
- Replaced stalled CSS frameworks with modern actively maintained alternatives.

### Added
- [Fomantic UI](https://fomantic-ui.com) template (replaces Semantic UI).
- [Cirrus CSS](https://cirrus-ui.com) template (replaces Spectre.css).
- [Vanilla Framework](https://vanillaframework.io) template (replaces Halfmoon).
- [Beer CSS](https://www.beercss.com) template (replaces Materialize).
- New shortcut display methods:
  - `flash()->displayFomantic(...)`
  - `flash()->displayCirrus(...)`
  - `flash()->displayVanilla(...)`
  - `flash()->displayBeercss(...)`
- Root-level devcontainer configuration (PHP 8.4).

### Changed
- Updated CDN versions for all active frameworks:
  - Bootstrap 5.3.0-alpha1 &rarr; 5.3.8
  - Bulma 0.9.4 &rarr; 1.0.4
  - Foundation 6.7.5 &rarr; 6.9.0
  - Primer 20.8.0 &rarr; 21.1.1
  - UIKit 3.15.22 &rarr; 3.23.13
  - Beer CSS 4.0.2 &rarr; 4.0.21

### Removed
- `Templates::SEMANTIC` constant and `SemanticTemplate` class.
- `Templates::SPECTRE` constant and `SpectreTemplate` class.
- `Templates::HALFMOON` constant and `HalfmoonTemplate` class.
- `Templates::MATERIALIZE` constant and `MaterializeTemplate` class.
- Shortcut methods: `displaySemantic()`, `displaySpectre()`, `displayHalfmoon()`, `displayMaterialize()`.

## 3.0.1 - 2024-12-10

### Added
- PHP 8.4 support (#17) added.
- Integration with Devcontainers for local development.

### Changed
- Build and tests CI processed moved to scrutinizer.

## 3.0.0 - 2023-01-26

**Breaking Changes!** 
- Minimum PHP version is now 7.3.
- Function `flash()` is now namespaced: `Tamtamchik\NameCase\flash`.

### Added

- [Halfmoon](https://www.gethalfmoon.com) alerts added.
- New optional property for framework for display method.
  - `flash()->display(..., Templates::TAILWIND)`
- Shortcut methods for displaying alerts with framework templates: 
  - `flash()->displayBootstrap(...)` 
  - `flash()->displayFoundation(...)`
  - `flash()->displayBulma(...)`
  - `flash()->displayMaterialize(...)`
  - `flash()->displayTailwind(...)`
  - `flash()->displayPrimer(...)`
  - `flash()->displayUikit(...)`
  - `flash()->displaySemantic(...)`
  - `flash()->displaySpectre(...)`
  - `flash()->displayHalfmoon(...)`

### Deprecated
- `flash()->hasMessages(...)` is deprecated. Use `flash()->some(...)` instead.

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
