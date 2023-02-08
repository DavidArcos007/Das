<html>

<head>
    <meta charset="UTF-8">
    <link rel=StyleSheet href="css/template.css" typr="text/css">

</head>

<body>
    <header>
    <h1> UNIVERSIDAD TÉCNICA DE AMBATO</h1>
    </header>
    <?php
    include "modules/navigationAdmin.php";
    ?>
    <section>
        <?php
        $mvc = new MvcControllerAdmin();
        $mvc->enlacesPaginasControllerAdmin();
        ?>
    </section>
</body>

</html>