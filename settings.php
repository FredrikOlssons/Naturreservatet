<?php

session_start();

if (isset($_SESSION["animals"])) {
    header('Location:http://localhost:3000/results.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naturreservatet</title>
</head>

<body>

    <form action="./result.php" method="POST">
        Tiger:<input placeholder="Tiger" type="number" max=5 name="Tiger"><br>
        Elefant:<input placeholder="Elefant" type="number" max=5 name="Elefant"><br>
        Giraff:<input placeholder="Giraff" type="number" max=5 name="Giraff"><br>
        Guldfisk:<input placeholder="Guldfisk" type="number" max=5 name="Guldfisk"><br>
        Björn:<input placeholder="Björn" type="number" max=5 name="Björn"><br>
        Ros:<input placeholder="Rosor" type="number" max=5 name="Rosor"><br>
        Lejon:<input placeholder="Lejon" type="number" max=5 name="Lejon"><br>
        Gorilla:<input placeholder="Gorilla" type="number" max=5 name="Gorilla"><br>
        Pudu:<input placeholder="Pudu" type="number" max=5 name="Pudu"><br>
        Antilop:<input placeholder="Antilop" type="number" max=5 name="Antilop"><br>

        <button type="submit">SPARA</button>
    </form>


</body>

</html>

