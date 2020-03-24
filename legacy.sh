#!/bin/sh

# Convert to legacy version
find tests -name '*.php' -exec sed -i '.bak' 's/PHPUnit\\Framework\\TestCase/PHPUnit_Framework_TestCase/' {} \;
find tests -name '*.php' -exec sed -i '.bak' 's/protected function setUp(): void/public function setUp()/' {} \;
find tests -name '*.php' -exec sed -i '.bak' 's/assertStringNotContainsString(/assertNotContains(/' {} \;
find tests -name '*.php' -exec sed -i '.bak' 's/assertStringContainsString(/assertContains(/' {} \;

# Convert to latest version
#find tests -name '*.php' -exec sed -i '.bak' 's/PHPUnit_Framework_TestCase/PHPUnit\\Framework\\TestCase/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/public function setUp()/protected function setUp(): void/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/assertNotContains(/assertStringNotContainsString(/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/assertContains(/assertStringContainsString(/' {} \;
