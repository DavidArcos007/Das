<?php 
    include('models/conexion.php');
    
    if (empty($_SESSION['user'])) {
        echo "SESION NO INICIADA"; 
        die();
    }else{
        $sesion = "
        select NOM_USU
        from usuarios
        where CED_USU = '".$_SESSION["user"]."'
        ";
        $resultado2 = mysqli_query($conn, $sesion);
        $sesionNombre = mysqli_fetch_assoc($resultado2);
    }
 ?>
<html>
    <H2>BIENVENIDO :  <?php echo $sesionNombre["NOM_USU"]?></H2>
    <div style="text-align: center;">
    <img src="img/inic.jpg" height="550">
    </div>
</html>
