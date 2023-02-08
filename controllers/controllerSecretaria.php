<?php
class MvcControllerSecretaria
{
    public function plantillaSecretaria()
    {
        include "views/templateSecretaria.php";
    }

    public function enlacesPaginasControllerSecretaria()
    {
        if(isset($_GET["action"]) )
        {
            $enlacesController= $_GET["action"];
        }
        else
        {
            $enlacesController="inicio.php";
        }
        $respuesta= EnlacesPaginas::enlacesPaginasModel($enlacesController);
        include $respuesta;

    }
}