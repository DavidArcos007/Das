<?php
session_start();

if (empty($_SESSION['active'])) {
    header('location: index.php');}
require_once "controllers/controllerSecretaria.php";
require_once "models/model.php";
$mvc = new MvcControllerSecretaria();
$mvc -> plantillaSecretaria();
?>