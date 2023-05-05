<?php

namespace Framework\Container;

use Psr\Container\ContainerInterface;
use ReflectionClass;
use ReflectionParameter;

class Container implements ContainerInterface
{

    private array $services = [];


    public function add(string $id, string|object $concrete = null)
    {
        if (null === $concrete) {
            $concrete = $id;
        }

        if (!class_exists($concrete)) {
            throw new ContainerException("Service $concrete could not be found");
        }

        $this->services[$id] = $concrete;
        return $this;
    }

    public function has(string $id): bool
    {
        return !empty($this->services[$id]);
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            if (!class_exists($id)) {
                throw new ContainerException("Service $id could not be resolved");
            }

            $this->add($id);
        }

        $service = $this->resolve($this->services[$id]);

        return $service;
    }

    private function resolve($className)
    {
        $reflection = new ReflectionClass($className);

        if (! $constructor = $reflection->getConstructor()) {
            return $reflection->newInstance();
        }

        $params = $constructor->getParameters();

        $classDependencies = $this->resolveClassDependencies($params);

        $service = $reflection->newInstanceArgs($classDependencies);

        return $service;
    }

    private function resolveClassDependencies(?array $reflectionParameters): array
    {
        $dependecies = [];

        /** @var ReflectionParameter $param */
        foreach($reflectionParameters as $param){
            $serviceType = $param->getType();
            
            if(class_exists($name = $serviceType->getName())){
                $service = $this->get($name);
                $dependecies[] = $service;
            }            
        }

        return $dependecies;
    }
}
