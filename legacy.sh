#!/bin/sh
find tests -name '*.php' -exec sed -i '.bak' 's/PHPUnit\\Framework\\TestCase/PHPUnit_Framework_TestCase/' {} \;
find tests -name '*.php' -exec sed -i '.bak' 's/protected function setUp(): void/public function setUp()/' {} \;

find tests -name '*.php' -exec sed -i '.bak' 's/assertStringNotContainsString(/assertNotContains(/' {} \;
find tests -name '*.php' -exec sed -i '.bak' 's/assertStringContainsString(/assertContains(/' {} \;
