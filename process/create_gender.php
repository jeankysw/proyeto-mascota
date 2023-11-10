<?php
require_once(__DIR__ . "/../controller/gender2.Controller.php");
$genderC = new Gender2Controller;
$gender = new Gender;
$valido = true;
$gender->name = $_POST["name"];
if ($gender->name == "") {
    $valido = false;
    $error["name"]  = "Este campo es obligatorio";
}
if ($_POST["last_name"] == "") {
    $valido = false;
    $error["last_name"]  = "Este campo es obligatorio";
}
if ($valido) {
    $status = $genderC->create($gender);
    if ($status) {
        $message = "Se guardo en la base de datos";
    } else {
        $message = "No Se guardo en la base de datos";
    }
}
