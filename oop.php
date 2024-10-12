<?php
    class Human {
       public $gender = "Male <br>";
       public $skinColor = "Fair <br>";
       public $humanName = "Victor";

       public function __construct($gen, $skinColor, $humanName)
       {
            $this->gender = $gen;
            $this->skinColor = $skinColor;
            $this->humanName = $humanName;
       }

       public function eat(){
        return "$this->humanName needs to eat <br>";
       }

       public function sleep(){
        return "Daniel loves sleep than money <br>";
       }
    }

    $daniel = new Human("Male", "Fair", "Daniel");
    $human2 = new Human("Female", "Dark", "Victoria");
    echo $human2->eat();
    echo $daniel->skinColor;
    echo $daniel->eat();

    $samuel = new Human("Male", "Fair", "samuel");
    $samuel->gender = "Others <br>";
    $samuel->humanName = "Samuel ";
    echo $samuel->gender;
    echo $samuel->eat();
?>