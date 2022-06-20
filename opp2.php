<?php

use Fruit1 as GlobalFruit1;

    class Fruit1 {
        public $name;
        public $color;

        function __construct($name, $color)
        {
            $this -> name = $name;
            $this -> color = $color;
        }
        function get_name() {
            return $this -> name;
        }
        function get_color() {
            return $this -> color;
        } 
        function __destruct()
        {
            echo "The fruit1 is {$this->name} and the color is {$this -> color} .";
        }
    }
    class Fruit2 extends Fruit1 {
        public $weight;
        function __construct($name, $color, $weight)
        {
            $this -> name = $name;
            $this -> color = $color;
            $this -> weight = $weight;
        }
        function __destruct()
        {
            echo "The fruit2 is {$this->name} and the color is {$this -> color}, the weight is {$this -> weight} .";    
        }
    }
    $apple = new Fruit1("Apple", "red");
    $banana = new Fruit1("banana", "black");
    $oi = new Fruit2("oi", "xanh", "1kg")

?>