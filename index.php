<?php
    include_once 'usr.php';
    include_once 'usrSession.php';
    $userSession = new UsrSession();
    $objectUser = new User();
    if (isset($_SESSION['nombre'])) {
        include_once 'servicio.php';
    }else if(isset($_POST['usr']) && $_POST['pwd']){
        $user = $_POST['usr'];
        $password = $_POST['pwd'];

        if ($objectUser->usrExists($user,$password)) {
            echo "1";
            $userSession->setCurrentUser($user);
            $objectUser->setUsr($user, $password);
            include_once 'servicio.php';
        }else{
            $errorLogin = "Nombre de usuario y o password incorrecto";
            echo "2";
            include_once 'log.php';
        }
    }else{
        echo "3";
        include_once 'log.php';
    }
?>