<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAST DE PUEBLA</title>
</head>
<body>
    <form action="" method="POST">
        <?php
            if (isset($errorLogin)) {
                echo $errorLogin;
            }
        ?>
        <input type="text" placeholder="Usuario" id="usr" name="usr">
        <input type="text" placeholder="password" id="pwd" name="pwd">
        <input type="submit" value="ingresar">
    </form>
</body>
</html>
