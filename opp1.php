<?php
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
    }
    $apple = new Fruit1("Apple", "red");
    $banana = new Fruit1("banana", "black");

    echo $apple -> get_name();
    echo " color ". $apple -> get_color();
    echo "<br>";
    echo $banana -> get_name();
?>