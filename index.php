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
            $userSession->setCurrentUser($user);
            //$objectUser->setUsr($user, $password);
            include_once 'servicio.php';
        }else{
            $errorLogin = "Nombre de usuario y o password incorrecto";
            include_once 'log.php';
        }
    }else{
        include_once 'log.php';
    }
?>