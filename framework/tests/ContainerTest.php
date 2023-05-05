<?php

namespace Framework\Tests;

use Framework\Container\Container;
use Framework\Container\ContainerException;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    /** @test */
    public function a_service_can_be_retrieved_from_the_container()
    {
        // Setup
        $container = new Container();

        // Do Something

        $container->add('dependant-class', DependantClass::class);

        // Make assertions
        $this->assertInstanceOf(DependantClass::class, $container->get('dependant-class'));
    }

    /** @test */
    public function a_container_exception_is_thrown_if_a_service_cannot_be_found()
    {
        // setup
        $container = new Container();

        // throw exception
        $this->expectException(ContainerException::class);

        $container->add('foobar');
    }

    /** @test */
    public function can_check_if_the_container_has_a_service():void
    {
        // setup 

        $container = new Container();

        // $container->add('dependant-class', DependantClass::class);
        
        // check a key
        $has = $container->has('dependant-class');

        $this->assertFalse($has);
    }

    /** @test */
    public function services_can_be_recursively_autowired()
    {
        $container = new Container();

        $container->add('dependency', DependencyClass::class);

        $dependencyService = $container->get('dependency');

        $this->assertInstanceOf(DependantClass::class, $dependencyService->dependant());

        dd($container);

    }
}