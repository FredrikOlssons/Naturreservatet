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
        <input placeholder="Tiger" type="text" name="Tiger">
        <input placeholder="Elefant" type="text" name="Elefant">
        <input placeholder="Giraff" type="text" name="Giraff">
        <input placeholder="Guldfisk" type="text" name="Guldfisk">
        <input placeholder="Björn" type="text" name="Björn">
        <input placeholder="Rosor" type="text" name="Rosor">
        <input placeholder="Lejon" type="text" name="Lejon">
        <input placeholder="Gorilla" type="text" name="Gorilla">
        <input placeholder="Pudu" type="text" name="Pudu">
        <input placeholder="Antilop" type="text" name="Antilop">

        <button type="submit">SPARA</button>
    </form>


</body>

</html>

