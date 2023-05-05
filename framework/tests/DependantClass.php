<?php

namespace Framework\Tests;

use PHPUnit\Framework\TestCase;

class DependantClass
{
    public function __construct(
        private SubDependencyClass $subDependencyClass
    ) {
    }
}
