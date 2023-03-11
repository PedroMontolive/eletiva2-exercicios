<?php

interface InterfaceName {
    public function someMethod1();
    public function someMethod2($name, $color);
    public function someMethod3() : string;
}

interface IAnimal {
    public function makeSound();
}

class Dog implements IAnimal {
    public function makeSound() {
        echo "Au au";
    }
}