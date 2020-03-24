#!/bin/sh

# Convert to legacy version (Mac OS)
#find tests -name '*.php' -exec sed -i '.bak' 's/PHPUnit\\Framework\\TestCase/PHPUnit_Framework_TestCase/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/protected function setUp(): void/public function setUp()/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/assertStringNotContainsString(/assertNotContains(/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/assertStringContainsString(/assertContains(/' {} \;

# Convert to legacy version (Linux)
find tests -name '*.php' -exec sed 's/PHPUnit\\Framework\\TestCase/PHPUnit_Framework_TestCase/' {} \;
find tests -name '*.php' -exec sed 's/protected function setUp(): void/public function setUp()/' {} \;
find tests -name '*.php' -exec sed 's/assertStringNotContainsString(/assertNotContains(/' {} \;
find tests -name '*.php' -exec sed 's/assertStringContainsString(/assertContains(/' {} \;

# Convert to latest version (Mac OS)
#find tests -name '*.php' -exec sed -i '.bak' 's/PHPUnit_Framework_TestCase/PHPUnit\\Framework\\TestCase/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/public function setUp()/protected function setUp(): void/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/assertNotContains(/assertStringNotContainsString(/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/assertContains(/assertStringContainsString(/' {} \;

# Convert to latest version (Linux)
#find tests -name '*.php' -exec sed 's/PHPUnit_Framework_TestCase/PHPUnit\\Framework\\TestCase/' {} \;
#find tests -name '*.php' -exec sed 's/public function setUp()/protected function setUp(): void/' {} \;
#find tests -name '*.php' -exec sed 's/assertNotContains(/assertStringNotContainsString(/' {} \;
#find tests -name '*.php' -exec sed 's/assertContains(/assertStringContainsString(/' {} \;
