#!/bin/sh

# Convert to legacy version (Mac OS)
#find tests -name '*.php' -exec sed -i '.bak' 's/protected function setUp(): void/public function setUp()/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/assertStringNotContainsString(/assertNotContains(/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/assertStringContainsString(/assertContains(/' {} \;

# Convert to legacy version (Linux)
find tests -name '*.php' -exec sed -i 's/protected function setUp(): void/public function setUp()/' {} \;
find tests -name '*.php' -exec sed -i 's/assertStringNotContainsString(/assertNotContains(/' {} \;
find tests -name '*.php' -exec sed -i 's/assertStringContainsString(/assertContains(/' {} \;

# Convert to latest version (Mac OS)
#find tests -name '*.php' -exec sed -i '.bak' 's/public function setUp()/protected function setUp(): void/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/assertNotContains(/assertStringNotContainsString(/' {} \;
#find tests -name '*.php' -exec sed -i '.bak' 's/assertContains(/assertStringContainsString(/' {} \;

# Convert to latest version (Linux)
#find tests -name '*.php' -exec sed -i 's/public function setUp()/protected function setUp(): void/' {} \;
#find tests -name '*.php' -exec sed -i 's/assertNotContains(/assertStringNotContainsString(/' {} \;
#find tests -name '*.php' -exec sed -i 's/assertContains(/assertStringContainsString(/' {} \;
