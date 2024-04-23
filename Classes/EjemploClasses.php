<?php
    declare(strict_types=1);

    class SuperHero {

    //(Con PHP 8+ utilizamos las promoted properties, se definen en el constructor directamente)

    //Propiedades
        # public $name;
        # public $powers;
        # public $planet;

    //Constructor
        public function __construct(
            readonly private string $name, 
            readonly private array $powers, 
            readonly private string $planet) {

        }

    //Métodos
        public function attack() {
            return "$this -> name attacks with his/her powers!";
        }

        public function description() {
            $powers = implode(", ", $this -> powers);

            return "$this -> name is a Superher, comes from 
            $this -> planet and has the following powers: 
            $powers";
        }

        public function show_all() {
            return get_object_vars($this);
        }
    
    //Métodos estaticos
        public static function random() {
            $names = ["Batman", "Superman", "Ironman", "Hulk"];
            $powers =[
                ["Volar", "Rayos laser", "Superfuerza"],
                ["Inteligencia", "Dinero", "Perspicacia"],
                ["Inteligencia", "Dinero", "Tecnologia"],
                ["Brutalidad", "Fuerza", "Destrucción"]
            ];
            $planets = ["Laboratorio", "Krypton", "Asgard", "Tierra"];

            $names = $names[array_rand($names)];
            $powers = $powers[array_rand($powers)];
            $planets = $planets[array_rand($planets)];

            return new self($names, $powers, $planets);
        }
    }

//Instancia de prueba + Asignación + Echo
    # $hero = new SuperHero();
    # $hero -> name = "Batman";
    # echo $hero -> name;

//Método para visualizar todas las propiedades del objeto instanciado
    # var_dump($hero -> show_all());

//Método estatico (No hay que instanciar la clase para usarlo)
    # $hero = SuperHero::random();
    # echo $hero -> description();

//Método publico (Hay que instanciar para poder usarlo)
    # $hero = new SuperHero("Black Panther", ["Tecnologia", "Iridium", "Dinero"], "Uganda");
    # $hero -> description();
?>