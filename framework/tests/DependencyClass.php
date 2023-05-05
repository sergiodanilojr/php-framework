<?php

namespace Framework\Tests;

use PHPUnit\Framework\TestCase;

class DependencyClass
{
    public function __construct(
        private DependantClass $dependant,
        protected bool $make = true
    ) {
    }

    public function dependant()
    {
        return $this->dependant;
    }
}
