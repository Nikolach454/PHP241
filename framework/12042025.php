<?php

class Cat {
    private $name;

    public function setName(string $name) {
        $this->name = $name;
    }
    public function sayMau() {
        return "mau, I am " .$this->name;
    }
}

$cat1 = new Cat;

$cat1->setName("Илюха");
echo $cat1->sayMau();

