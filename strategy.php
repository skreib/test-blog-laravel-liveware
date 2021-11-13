<?php

abstract class Duck {
    private $flyable;
    private $quackable;

    public function __construct(FlyableStrategy $flyable, Quackable $quackable)
    {
        $this->flyable = $flyable;
        $this->quackable = $quackable;
    }
    public function fly () {$this->flyable->fly();}
    public function quack () {$this->quackable->quack();}
    public function swim() { /*make some stuff*/ }
    abstract public function display();
}

class MallardDuck extends Duck {
    public function display() { /*display Mallard Duck*/ }
}

class ReadHeadDuck extends Duck {
    public function display() { /*display Mallard Duck*/ }
}

class RubberDuck extends Duck {
    public function display() { /*display rubber duck */ }
}

class DecoyDuck extends Duck {
    public function display() {/*display DecoyDuck*/}
}

$concreteDuck = new ReadHeadDuck(
    new FlyWithWings(),
    new LiveDuckQuack()
);
$concreteDuck->fly();

$decoyDuck = new DecoyDuck(
    new FlyNoWay(),
    new Squeak(),
);
$decoyDuck->fly();


/*-------------------------------------------------------------------------*/
interface FlyableStrategy {
    public function fly();
}

// has a -> composition
// is a -> inheritance
class FlyWithWings implements FlyableStrategy {
    public function fly() { echo 'i believe i can fly!'; }
}
class FlyNoWay implements FlyableStrategy {
    public function fly() { echo "i can't fly!"; }
}

interface Quackable {
    public function quack();
}
class LiveDuckQuack implements Quackable {
    public function quack() { echo 'quack-quack'; }
}
class Squeak implements Quackable {
    public function quack() { echo 'squeak-squeak'; }
}
class Muted implements Quackable {
    public function quack() { echo 'no sound'; }
}


abstract class Animal {
    abstract public function makeSound();
}
class Cat extends Animal {
    public function makeSound() { echo 'Meow'; }
}
class Dog extends Animal {
    public function makeSound() { echo 'Bark'; }
}
