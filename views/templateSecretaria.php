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
    include "modules/navigationSecretaria.php";
    ?>
    <section>
        <?php
        $mvc = new MvcControllerSecretaria();
        $mvc->enlacesPaginasControllerSecretaria();
        ?>
    </section>
</body>

</html>