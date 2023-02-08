<?php 

    require_once "conexion.php";

    $conexion=conexion();

        $usuario=$_POST['usuario'];
        $pass=($_POST['password']);

        $sql="SELECT * from usuarios where CED_USU='$usuario' and CLA_USU='$pass'";
        $result=mysqli_query($conexion,$sql);

        if(mysqli_num_rows($result) > 0){
            if($usuario == '1805284997' && $pass=='1234'){
            session_start();
            $_SESSION['active'] = true;
            $_SESSION['user']=$usuario;
            echo 1;
            }else if ($usuario == '1804277125' && $pass=='c123'){
                session_start();
                $_SESSION['active'] = true;
                $_SESSION['user']=$usuario;
                    echo 2;

        }else{
            echo 0;
        }
    }
 ?>