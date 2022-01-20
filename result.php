<?php

//session_start()

//if (isset($_SESSION))
session_start();

$animalQuantity = [];

$amountOfTigers = unserialize($_SESSION["animals"])["Tiger"];
$amountOfElephants = unserialize($_SESSION["animals"])["Elefant"];
$amountOfGiraffes = unserialize($_SESSION["animals"])["Giraff"];
$amountOfGoldfishes = unserialize($_SESSION["animals"])["Guldfisk"];




if (isset($_SESSION["animals"])) {
    header('Location:http://localhost:3000/results.php');
}




if (isset($_SERVER["REQUEST_METHOD"])) {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["Tiger"]) && isset($_POST["Elefant"]) && isset($_POST["Giraff"]) && isset($_POST["Guldfisk"])) {

            $Tiger = $_POST["Tiger"];
            $Elefant = $_POST["Elefant"];
            $Giraff = $_POST["Giraff"];
            $Guldfisk = $_POST["Guldfisk"]; //----------------------------------spara till session istället för post -> om det inte finns något sparat i den innan

            $animals= [];
            }
    
        $imageNumber = 1;

        for ($array = 1; $array <= $Tiger; $array++) {

            $rawData = file_get_contents("https://randomuser.me/api/");
            $name = json_decode($rawData)->results[0]->name->first;

            $tigerAddedToList = new Tiger("./imgs/tigers/tiger"  . $imageNumber . ".jpg", animalsColor(), $name, animalsPattern());
            array_push($animals, $tigerAddedToList);
            /* echo $tigerAddedToList->name;
            echo $tigerAddedToList->animalColor;
            echo $tigerAddedToList->animalPattern; */
            //echo '<img src="'.$tigerAddedToList->picture.'" alt="Picture of a tiger">' ;
            $imageNumber = incrementImageCount($imageNumber);
        }

         $imageNumber = 1;

         for ($array = 1; $array <= $Elefant; $array++) {

             $rawData = file_get_contents("https://randomuser.me/api/");
             $name = json_decode($rawData)->results[0]->name->first;

             $elephantsAddedToList = new Elefant("./imgs/elephants/elephant"  . $imageNumber . ".jpg", animalsColor(), $name, animalsPattern());
             array_push($animals, $elephantsAddedToList);
             /* echo $elephantsAddedToList->name;
             echo $elephantsAddedToList->animalColor;
             echo $elephantsAddedToList->animalPattern; */
             //echo '<img src="'.$elephantsAddedToList->picture.'" alt="Picture of a elephant">' ;
             $imageNumber = incrementImageCount($imageNumber);
         }
         
         $imageNumber = 1;

         for ($array = 1; $array <= $Giraff; $array++) {
            $rawData = file_get_contents("https://randomuser.me/api/");
            $name = json_decode($rawData)->results[0]->name->first;

            $giraffeAddedToList = new Giraff("./imgs/giraffes/giraffe"  . $imageNumber . ".jpg", animalsColor(), $name, animalsPattern());
            array_push($animals, $giraffeAddedToList);
             /* echo $giraffeAddedToList->name;
             echo $giraffeAddedToList->animalColor;
             echo $giraffeAddedToList->animalPattern; */
             //echo '<img src="'.$giraffeAddedToList->picture.'" alt="Picture of a giraffe">' ;
             $imageNumber = incrementImageCount($imageNumber);
         }
                   
         $imageNumber = 1;
         
         for ($array = 1; $array <= $Guldfisk; $array++) {
             $rawData = file_get_contents("https://randomuser.me/api/");
             $name = json_decode($rawData)->results[0]->name->first;
             
             $goldfishAddedToList = new Guldfisk("./imgs/goldfishes/goldfish" . $imageNumber . ".jpg", animalsColor(), $name, animalsPattern());
             array_push($animals, $goldfishAddedToList);
            /*  echo $goldfishAddedToList->name;
             echo $goldfishAddedToList->animalColor;
             echo $goldfishAddedToList->animalPattern;
             echo $text; */
             //echo '<img src="'.$goldfishAddedToList->picture.'" alt="Picture of a goldfish">' ;
             $imageNumber = incrementImageCount($imageNumber);
            }

            if (empty($_POST['Tiger']) && empty($_POST['Elefant']) && empty($_POST['Giraff']) && empty($_POST['Guldfisk'])) {
                echo " <br/> Please fill in at least one of the fields";
                exit;
            }
            
            foreach ($animals as $animalInstance) {
                $animalInstance->showPicture();
                echo "<br>" .$animalInstance->name."<br>" ;// . " " . $animalInstance->makeSound() . '<br><br>';
            }
        }
    }    
    
     function animalsColor() {
        $color = array("Red", "Blue", "Green", "Black", "Pink");
        $index =  rand(0, count($color) - 1);
        $animalColor = $color[$index];
        return $animalColor;
    } 

    function animalsPattern() {
        $pattern = array("Spots", "Stripes", "Stains", "Rectangles", "Head");
        $index = rand(0, count($pattern) - 1);
        $animalPattern = $pattern[$index];
        return $animalPattern;
    }
    
    
    abstract class Animal {
        public function onClickCode() {
            $text = 'alert("';
            $text .= $this->name;
            $text .= ": ";
            $text .= $this->animalsColor;
            $text .= ": ";
            $text .= $this->animalsPattern;
            $text .= ": ";
            $text .= $this->makeSound();
            $text .= '");';
            return $text;
            
        }

        
        public $name;
        public $animalColor;
        public $animalPattern;
        
        function __construct($color, $name, $pattern){
            $this->name = $name;
            $this->animalColor = $color;
            $this->animalPattern = $pattern;
        }
        
        
        
        abstract function makeSound();
        
        function showPicture() {
            echo "<img src= '".$this->picture."' onClick = '".$this->onClickCode(). "'/>";
        }
        
        public function onClick() {
            $text = 'alert'($this->name, $this->animalColor, $this->animalPattern, $this->makeSound());
            return $text;  
        }
    }
    
    
    
    class Tiger extends animal {
        public $picture;
        
        function __construct($pic, $color, $name, $pattern) {
            parent::__construct($color, $name, $pattern);
            
            $this->picture = $pic;
            
        }
        
        function makeSound() {
            return "ROOOOOAAAAAR";
        }
    }
    
    class Elefant extends animal {
        public $picture;
        
        function __construct($pic, $color, $name, $pattern) {
            parent::__construct($color, $name, $pattern);
            
            $this->picture = $pic;
        }
        function makeSound() {
            return "TUUUUUUUUUUUT";
        }
    }
    
    class Giraff extends animal {
        public $picture;
        
        function __construct($pic, $color, $name, $pattern) {
            parent::__construct($color, $name, $pattern);
            
            $this->picture = $pic;
            $this->color = $color;
        }
        
        function makeSound() {
            return "BRÖÖÖÖÖÖÖL";
        }
    }
    
    class Guldfisk extends animal {
        public $picture;
        
        function __construct($pic, $color, $name, $pattern) {
            parent::__construct($color, $name, $pattern);
            
            $this->picture = $pic;
            $this->color = $color;
        }
        
        function makeSound() {
            return "Blubbbb";
        }
    }

    class Björn extends animal {
        public $picture;
        
        function __construct($pic, $color, $name, $pattern) {
            parent::__construct($color, $name, $pattern);
            
            $this->picture = $pic;
            $this->color = $color;
        }
        
        function makeSound() {
            return "Braaaaahh";
        }
    }

    class Lejon extends animal {
        public $picture;
        
        function __construct($pic, $color, $name, $pattern) {
            parent::__construct($color, $name, $pattern);
            
            $this->picture = $pic;
            $this->color = $color;
        }
        
        function makeSound() {
            return "ROOOAAARRIMALION";
        }
    }

    class Ros extends animal {
        public $picture;
        
        function __construct($pic, $color, $name, $pattern) {
            parent::__construct($color, $name, $pattern);
            
            $this->picture = $pic;
            $this->color = $color;
        }
        
        function makeSound() {
            return "Swischswischswisch";
        }
    }

    class Gorilla extends animal {
        public $picture;
        
        function __construct($pic, $color, $name, $pattern) {
            parent::__construct($color, $name, $pattern);
            
            $this->picture = $pic;
            $this->color = $color;
        }
        
        function makeSound() {
            return "AaaawwAaaww";
        }
    }

    class Pudu extends animal {
        public $picture;
        
        function __construct($pic, $color, $name, $pattern) {
            parent::__construct($color, $name, $pattern);
            
            $this->picture = $pic;
            $this->color = $color;
        }
        
        function makeSound() {
            return "Piiiiip";
        }
    }

    class Antilop extends animal {
        public $picture;
        
        function __construct($pic, $color, $name, $pattern) {
            parent::__construct($color, $name, $pattern);
            
            $this->picture = $pic;
            $this->color = $color;
        }
        
        function makeSound() {
            return "Bjäääähh";
        }
    }
    function incrementImageCount($imageNumber) {
        if($imageNumber == 5) {
            return 1;
        } else {
            return $imageNumber + 1;
        }
    }

    ?>