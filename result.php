<?php


if (isset($_SERVER["REQUEST_METHOD"])) {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $_SESSION["animals"] = serialize($_POST);
    }

        if (empty($_POST['Tiger']) && empty($_POST['Elefant']) && empty($_POST['Giraff']) && empty($_POST['Guldfisk'])) {
            echo " <br/> Please fill in at least one of the fields";
            exit;
        }
        if ($_POST["Tiger"]) {
            $tiger = ($_POST["Tiger"]);
            
            //echo "<br>" . $tiger . "st" . " Tiger(s)";
            //echo "<img src=\"imgs/tigers/tiger-gebd6d2e9f_640.jpg\">";
        } if ($_POST['Elefant']) {
            $Elefant = ($_POST["Elefant"]);
            echo "<br>" . $Elefant . "st" . " Elefant(er)";
            echo "<img src=\"imgs/elephants/elephant-g698425c8c_640.jpg\">";
        } if ($_POST['Giraff']) {
            $Giraff = ($_POST["Giraff"]);
            echo "<br>" . $Giraff . "st" . " Giraff(er)";
            echo "<img src=\"imgs/giraffes/giraffe-gbc5be7546_640.jpg\">";
        } if ($_POST['Guldfisk']) {
            $Guldfisk = ($_POST["Guldfisk"]);
            echo "<br>" . $Guldfisk . "st" . " Guldfisk(ar)";
            echo "<img src=\"imgs/goldfishes/eye-g243bc46fe_640.jpg\">";
        }
}

$animals= [];

$tigerAddedToList = serialize($tiger);
echo $tigerAddedToList;

for ($array = 1; $array <= $_POST["Tiger"]; $array++) {

    $tiger = new Tiger("<img src=\"imgs/tigers/tiger-gebd6d2e9f_640.jpg\">", "red", "Pelle");
    echo $tiger;
}


abstract class Animal {
    public $name;// = file_get_contents("https://randomuser.me/api/");
    
    function __construct($name){
        $this->name = $name;
    }
    
    public function getPicture()
    {
        return $this->picture;
    }

    abstract function makeSound();
    
    
};



class Tiger extends animal {
    public $picture = "<img src=\"imgs/tigers/tiger-gebd6d2e9f_640.jpg\">";
    protected $color;
    
    function __construct($pic, $color, $name) {
        parent::__construct($name);

        $this->picture = $pic;
        $this->color = $color;
    }

    function makeSound() {
        return "Roooaaaar";
    }
}

class Elefant extends animal {

    function makeSound() {
        echo "TUUUUUUUUUUUT";
    }
}

class Giraff extends animal {

    function makeSound() {
        echo "Brööööööl";
    }
}

class Guldfisk extends animal {

    function makeSound() {
        echo "Blubbbb";
    }
}
/* 

$filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "image/".$filename;

        <img src='picturename.png' />

*/
?>