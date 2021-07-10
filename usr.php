<?php
    //include('conexion.php');
    /*
        $usuario = $_POST['usr'];
        $pwd = $_POST['pwd'];

        $query = "SELECT * FROM usr WHERE usuario=SHA1('$usuario') AND contrasena=SHA1('$pwd')";
        $result = mysqli_query($conexion, $query);

        if (mysqli_fetch_array($result)) {
            session_start();
            header("Location: index.php");
        }else{
            header("Location: login.php");
        }
    */
    class User{
        private $username;
        private $nombre;
        public function usrExists($user, $pwd){
            include_once 'conexion.php';
            $query = "SELECT * FROM usr WHERE usuario=SHA1('$user') AND contrasena=SHA1('$pwd')";
            $result = mysqli_query($conexion, $query);
            if (mysqli_fetch_array($result)) {
                return true;
            }else{
                return false;
            } 
        }

        public function setUsr($usr){
            include_once 'conexion.php';
            $query = "SELECT * FROM usr WHERE usuario=SHA1('$usr')";
            $result = mysqli_query($conexion, $query);
            foreach (mysqli_fetch_array($result) as $currentUser) {
                $this->nombre = $currentUser['nombre'];
            }
        }

        public function getNombre(){
            return $this->nombre;
        }

    }    

?>