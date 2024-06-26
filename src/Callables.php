<?php

/*
 * This file is part of the Laradev project
 * (c) Darras Florian florian@laradev.ca
 */

namespace Laradev\Callables;

trait Callables
{
    public function __call(string $name, array $arguments): mixed
    {
        $ref = new \ReflectionClass($this);
        $property = lcfirst((str_replace(['set', 'get', 'add'], '', $name)));

        if (!$ref->hasProperty($property)) {
            $class = $this::class;
            throw new \Exception("Property {$property} is not found in {$class}");
        }

        if (str_contains('set', $name)) {
            $this->$property = $arguments[0] ?? null;
            return $this;
        } elseif (str_contains('add', $name)) {
            $this->$property[] = $arguments[0] ?? null;
            return $this;
        } else {
            return $this->$property;
        }
    }
}
