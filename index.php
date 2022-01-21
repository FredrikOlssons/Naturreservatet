<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

try {
    session_start();

    if($_SERVER["REQUEST_METHOD"]) {
        echo "server funkar";

    if (isset($_SESSION["animals"])) {
        header('location:http://localhost:3000/result.php');
        //echo '<script>window.location="localhost:3000/result.php"</script>';
        exit;
    } else {
        header('location:http://localhost:3000/settings.php');
        //echo '<script>window.location="localhost:3000/settings.php"</script>';
        exit;
    }} else {
        echo "Nuts";
    }
    
} catch(Exception $err) {
    http_response_code($error->getcode);

}

ss


    //redirect, if isset + else till -> settings

    ?>
</body>
</html>